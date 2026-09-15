<?php
/**
 * Dynamic fallback OG image generator (GD).
 *
 * Serves /og/<file>.png via WP rewrites. If the static PNG already exists in
 * uploads/og it is sent as-is (bytes for bytes identical to the Pillow build).
 * The on-the-fly GD compositor only runs when a static image is missing, so the
 * layered images (URL) on this site are always the pre-generated ones.
 *
 * Requires GD + FreeType. All layout numbers mirror generate_og.py.
 */

if (!defined('ABSPATH')) {
    exit;
}

function w3d_og_render($title, $badge, $glyph, $glyph_kind)
{
    $W = 1200;
    $H = 630;

    $im = imagecreatetruecolor($W, $H);
    imagefilledrectangle($im, 0, 0, $W, $H, imagecolorallocate($im, 10, 14, 26));

    // grid every 40px
    $grid = imagecolorallocate($im, 24, 30, 44);
    for ($x = 0; $x < $W; $x += 40) {
        imageline($im, $x, 0, $x, $H, $grid);
    }
    for ($y = 0; $y < $H; $y += 40) {
        imageline($im, 0, $y, $W, $y, $grid);
    }

    // top border
    $orange = imagecolorallocate($im, 255, 122, 0);
    imagefilledrectangle($im, 0, 0, $W, 4, $orange);

    // left glow (approximation: soft vertical gradient bar next to edge)
    for ($i = 0; $i < 200; $i++) {
        $alpha = round(15 * (1 - $i / 200));
        $c = imagecolorallocatealpha($im, 255, 122, 0, 127 - round($alpha * 127 / 100));
        imagefilledellipse($im, 30, 315, 400 - $i, 400 - $i, $c);
    }

    $ttf = get_stylesheet_directory() . '/assets/fonts/ttf/';
    $sg  = $ttf . 'space-grotesk-700.ttf';
    $in4 = $ttf . 'inter-400.ttf';
    $in6 = $ttf . 'inter-600.ttf';
    $jm  = $ttf . 'jetbrains-mono-400.ttf';

    // header: logo mark + wordmark
    $mdark = imagecolorallocate($im, 10, 14, 26);
    imagefilledellipse($im, 84, 84, 40, 40, $orange);
    imagettftext($im, 23, 0, 77, 91, $mdark, $sg, 'W');

    $white = imagecolorallocate($im, 255, 255, 255);
    $muted = imagecolorallocate($im, 138, 148, 168);
    imagettftext($im, 18, 0, 120, 86, $white, $in6, 'Web3 Decentralization');
    imagettftext($im, 12, 0, 120, 108, $muted, $in4, 'Open Source (MIT)');

    // title: wrap at 48px, max 2 lines, centered block around y=330
    $font_size = 48;
    $maxw = 960;
    $words = preg_split('/\s+/', trim($title));
    $lines = array();
    $cur = '';
    foreach ($words as $w) {
        $t = trim($cur . ' ' . $w);
        $b = imagettfbbox($font_size, 0, $sg, $t);
        if (($b[2] - $b[0]) <= $maxw || $cur === '') {
            $cur = $t;
        } else {
            $lines[] = $cur;
            $cur = $w;
        }
    }
    if ($cur !== '') {
        $lines[] = $cur;
    }
    if (count($lines) > 2) {
        $lines = array_slice($lines, 0, 2);
        $dots = $lines[1] . "â€¦";
        while (strlen($lines[1]) > 0) {
            $b = imagettfbbox($font_size, 0, $sg, $lines[1] . "â€¦");
            if (($b[2] - $b[0]) <= $maxw) {
                break;
            }
            $lines[1] = mb_substr($lines[1], 0, -1);
        }
        $lines[1] = rtrim($lines[1]) . "â€¦";
    }

    $lh = 58;
    $block_h = count($lines) * $lh - 10;
    $start_y = 330 - (int)($block_h / 2);
    foreach ($lines as $i => $ln) {
        $b = imagettfbbox($font_size, 0, $sg, $ln);
        $w = $b[2] - $b[0];
        imagettftext($im, $font_size, 0, ($W - $w) / 2, $start_y + $i * $lh + $font_size, $white, $sg, $ln);
    }

    // badge bottom-left
    $chip_bg  = imagecolorallocate($im, 42, 26, 5);
    $chip_rgb = imagecolorallocate($im, 255, 122, 0);
    $bf = 15;
    $bb = imagettfbbox($bf, 0, $jm, $badge);
    $bw = ($bb[2] - $bb[0]) + 36;
    $bh = 38;
    $bx = 64;
    $by = $H - 96;
    imagefilledrectangle($im, $bx, $by, $bx + $bw, $by + $bh, $chip_bg);
    imagerectangle($im, $bx, $by, $bx + $bw, $by + $bh, $chip_rgb);
    imagettftext($im, $bf, 0, $bx + 18, $by + 26, $chip_rgb, $jm, $badge);

    // bottom-right glyph
    $ix = $W - 64 - ($glyph_kind === 'chain' ? 80 : 80);
    $iy = $H - 96 - 80;
    if ($glyph_kind === 'tool' || $glyph_kind === 'chain') {
        // monogram plate
        imagefilledellipse($im, $ix + 40, $iy + 40, 78, 78, imagecolorallocate($im, 15, 18, 31));
        imagesetthickness($im, 2);
        imageellipse($im, $ix + 40, $iy + 40, 78, 78, $orange);
        imagesetthickness($im, 1);
        $gb = imagettfbbox(30, 0, $sg, $glyph);
        imagettftext($im, 30, 0, $ix + 40 - (($gb[2] - $gb[0]) / 2), $iy + 40 + 10, $white, $sg, $glyph);
    } else {
        imagefilledellipse($im, $ix + 40, $iy + 40, 76, 76, imagecolorallocate($im, 15, 18, 31));
        imagesetthickness($im, 2);
        imageellipse($im, $ix + 40, $iy + 40, 76, 76, $orange);
        imagesetthickness($im, 1);
        $gl = imagettfbbox(26, 0, $sg, 'W3D');
        imagettftext($im, 26, 0, $ix + 40 - (($gl[2] - $gl[0]) / 2), $iy + 40 + 9, $white, $sg, 'W3D');
    }

    return $im;
}

function w3d_og_serve_from_uploads($file)
{
    $path = wp_upload_dir()['basedir'] . '/og/' . $file;
    if (file_exists($path)) {
        header('Content-Type: image/png');
        header('Cache-Control: public, max-age=31536000, immutable');
        readfile($path);
        exit;
    }
    return false;
}

function w3d_og_endpoint($wp)
{
    $file = isset($_GET['w3d_og']) ? sanitize_file_name($_GET['w3d_og']) : '';
    if ($file === '' || strpos($file, '.') === false) {
        return;
    }
    $slug = preg_replace('/\.png$/', '', $file);
    $key  = preg_replace('/^og-/', '', $slug); // registry / uploads file key

    $meta = w3d_og_registry($key);
    if (!$meta) {
        return; // unknown -> 404 via normal routing
    }
    if (w3d_og_serve_from_uploads('og-' . $key . '.png')) {
        return;
    }
    $im = w3d_og_render($meta['title'], $meta['badge'], $meta['glyph'], $meta['kind']);
    header('Content-Type: image/png');
    header('Cache-Control: public, max-age=86400');
    imagepng($im);
    imagedestroy($im);
    exit;
}