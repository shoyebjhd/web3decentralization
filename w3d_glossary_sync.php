<?php
// w3d_glossary_sync.php — import repo markdown glossary terms as llms_glossary posts (create-missing only)
// Run: wp eval-file /home/u435884427/w3d_glossary_sync.php --allow-root --path=/home/u435884427/domains/web3decentralization.com/public_html
// Afterwards: rm this file + /home/u435884427/glossary_md/

$DIR = '/home/u435884427/glossary_md';

function w3d_md_inline($text) {
  return preg_replace_callback(
    '/\[([^\]]+)\]\(([^)]+)\)/',
    function ($m) {
      $slug = preg_replace('/\.md$/', '', basename(trim($m[2])));
      if (!preg_match('/^[a-z0-9-]+$/', $slug)) return '<strong>' . esc_html($m[1]) . '</strong>';
      $exists = get_page_by_path($slug, OBJECT, 'llms_glossary');
      if ($exists) return '<a href="https://web3decentralization.com/glossary/' . $slug . '/">' . esc_html($m[1]) . '</a>';
      return '<strong>' . esc_html($m[1]) . '</strong>';
    },
    $text
  );
}

function w3d_md_body($body) {
  $body = str_replace(["\r\n", "\r"], "\n", $body);
  $blocks = preg_split('/\n{2,}/', trim($body));
  $html = '';
  $in_list = false;
  foreach ($blocks as $b) {
    $b = trim($b);
    if ($b === '') continue;
    if (preg_match('/^##\s+(.*)$/s', $b, $m)) {
      if ($in_list) { $html .= "</ul>\n"; $in_list = false; }
      $html .= '<h2>' . esc_html(trim($m[1])) . "</h2>\n";
      continue;
    }
    if (preg_match('/^\*\*Related:\*\*/', $b)) {
      if ($in_list) { $html .= "</ul>\n"; $in_list = false; }
      $rest = trim(preg_replace('/^\*\*Related:\*\*\s*/', '', $b));
      $html .= "<h2>Related terms</h2>\n<p>" . w3d_md_inline($rest) . "</p>\n";
      continue;
    }
    $lines = explode("\n", $b);
    $all_items = true;
    foreach ($lines as $ln) { if (!preg_match('/^\s*-\s+/', $ln)) { $all_items = false; break; } }
    if ($all_items) {
      if (!$in_list) { $html .= "<ul>\n"; $in_list = true; }
      foreach ($lines as $ln) {
        $item = trim(preg_replace('/^\s*-\s+/', '', $ln));
        $item = preg_replace('/\*\*(.+?)\*\*/', '<strong>$1</strong>', $item);
        $html .= '<li>' . w3d_md_inline($item) . "</li>\n";
      }
      continue;
    }
    if ($in_list) { $html .= "</ul>\n"; $in_list = false; }
    $para = preg_replace('/\n+/', ' ', $b);
    $para = preg_replace('/\*\*(.+?)\*\*/', '<strong>$1</strong>', $para);
    $html .= '<p>' . w3d_md_inline($para) . "</p>\n";
  }
  if ($in_list) $html .= "</ul>\n";
  return $html;
}

$created = 0; $skipped = 0; $failed = 0;
foreach (glob($DIR . '/*.md') as $file) {
  $slug = basename($file, '.md');
  if ($slug === 'README') continue;
  if (get_page_by_path($slug, OBJECT, 'llms_glossary')) { $skipped++; continue; }
  $raw = file_get_contents($file);
  if (!preg_match('/^---\s*\n(.*?)\n---\s*\n(.*)$/s', $raw, $m)) { echo "BAD FRONTMATTER: $slug\n"; $failed++; continue; }
  $fm = $m[1]; $body = $m[2];
  if (!preg_match('/^title:\s*"([^"]+)"\s*$/m', $fm, $tm)) { echo "NO TITLE: $slug\n"; $failed++; continue; }
  $title = $tm[1];
  $html = w3d_md_body($body);
  $excerpt = '';
  if (preg_match('/<p>(.*?)<\/p>/s', $html, $em)) {
    $excerpt = mb_substr(trim(strip_tags($em[1])), 0, 155);
  }
  $id = wp_insert_post([
    'post_type'    => 'llms_glossary',
    'post_status'  => 'publish',
    'post_title'   => $title,
    'post_name'    => $slug,
    'post_excerpt' => $excerpt,
    'post_content' => $html,
    'post_author'  => 2,
  ], true);
  if (is_wp_error($id)) { echo "FAILED $slug: " . $id->get_error_message() . "\n"; $failed++; }
  else { echo "created $id $slug\n"; $created++; }
}
echo "DONE: created=$created skipped=$skipped failed=$failed\n";
