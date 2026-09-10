<?php
/**
 * Template Name: Terminal Shell
 *
 * /terminal/ — interactive xterm.js shell over the 15 W3D tools.
 * Same-origin only: tool pages, glossary excerpts, local data JSON.
 *
 * @package w3d
 */

get_header();

$tools = get_posts(
	array(
		'post_type'      => 'w3d_tool',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'orderby'        => 'title',
		'order'          => 'ASC',
	)
);
$data_url = esc_url( get_theme_file_uri( 'assets/w3d-data.json' ) );
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/xterm@5.3.0/css/xterm.css">
<div class="w3d-wrap">
	<?php w3d_breadcrumbs(); ?>
	<header class="w3d-term-head">
		<p class="w3d-sec-label"><?php esc_html_e( 'Open Source (MIT)', 'w3d' ); ?></p>
		<h1 class="w3d-page-title"><?php esc_html_e( 'W3D Terminal - Open Source (MIT) - 15 Tools', 'w3d' ); ?></h1>
	</header>

	<?php while ( have_posts() ) : the_post(); ?>
		<?php $body = trim( wp_strip_all_tags( get_the_content() ) ); ?>
		<?php if ( $body ) : ?>
			<div class="w3d-content entry-content">
				<?php the_content(); ?>
			</div>
		<?php endif; ?>
	<?php endwhile; ?>

	<div class="w3d-term-search">
		<label class="screen-reader-text" for="w3d-term-filter"><?php esc_html_e( 'Filter tools', 'w3d' ); ?></label>
		<input type="search" id="w3d-term-filter" placeholder="<?php esc_attr_e( 'Filter tools as you type… (Enter opens top match)', 'w3d' ); ?>" autocomplete="off">
	</div>

	<div class="w3d-term-cols">
		<div class="w3d-term-left">
			<div id="w3d-term" aria-label="<?php esc_attr_e( 'W3D terminal', 'w3d' ); ?>"></div>
			<noscript><p><?php esc_html_e( 'The interactive shell needs JavaScript. Browse all tools below instead.', 'w3d' ); ?></p></noscript>
		</div>
		<div class="w3d-term-right">
			<div class="w3d-term-preview-head">
				<span><?php esc_html_e( 'Live preview', 'w3d' ); ?></span>
				<a id="w3d-term-full" href="<?php echo esc_url( home_url( '/terminal/tools/nakamoto-coefficient/' ) ); ?>"><?php esc_html_e( 'Open full page', 'w3d' ); ?></a>
			</div>
			<div id="w3d-term-preview"><p><?php esc_html_e( 'Type "help" in the terminal, or click a tool below.', 'w3d' ); ?></p></div>
		</div>
	</div>

	<section class="w3d-term-all" aria-label="<?php esc_attr_e( 'All tools', 'w3d' ); ?>">
		<h2><?php esc_html_e( 'All 15 tools', 'w3d' ); ?></h2>
		<div class="w3d-learn-grid" id="w3d-term-grid">
			<?php foreach ( $tools as $tool_post ) : ?>
				<div class="w3d-learn-card" data-slug="<?php echo esc_attr( $tool_post->post_name ); ?>" data-title="<?php echo esc_attr( $tool_post->post_title ); ?>">
					<h3><a href="<?php echo esc_url( get_permalink( $tool_post->ID ) ); ?>"><?php echo esc_html( $tool_post->post_title ); ?></a></h3>
					<p><?php echo esc_html( wp_trim_words( wp_strip_all_tags( $tool_post->post_excerpt ? $tool_post->post_excerpt : $tool_post->post_content ), 18 ) ); ?></p>
					<p><button type="button" class="w3d-btn w3d-term-open" data-slug="<?php echo esc_attr( $tool_post->post_name ); ?>"><?php esc_html_e( 'Open in shell', 'w3d' ); ?></button></p>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
</div>

<script src="https://cdn.jsdelivr.net/npm/xterm@5.3.0/lib/xterm.js"></script>
<script>
(function(){
'use strict';
var DATA_URL = <?php echo wp_json_encode( get_theme_file_uri( 'assets/w3d-data.json' ) ); ?>;
var SITE = <?php echo wp_json_encode( home_url( '/' ) ); ?>;
var DATA = { tools: [], chains: [], glossary: {} };

function esc(s){ return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;'); }

var termBox = document.getElementById('w3d-term');
var preview = document.getElementById('w3d-term-preview');
var fullLink = document.getElementById('w3d-term-full');
var filter = document.getElementById('w3d-term-filter');
var grid = document.getElementById('w3d-term-grid');

if (!window.Terminal){
  termBox.innerHTML = '<p>Terminal engine failed to load. Use the tool cards below — every tool works as a standalone page.</p>';
} else {
  var term = new Terminal({
    cursorBlink: true, fontFamily: 'ui-monospace, Menlo, Consolas, monospace', fontSize: 14,
    theme: { background: '#0b0e1a', foreground: '#d5dbe8', cursor: '#14B8A6', selectionBackground: '#14B8A655' }
  });
  term.open(termBox);
  var PROMPT = 'w3d@terminal:~$ ';
  var buf = '', hist = [], hi = -1;

  function println(s){ term.writeln(s || ''); }
  function printPrompt(){ term.write('\r\n' + PROMPT + buf); }

  function toolBySlug(slug){
    slug = (slug || '').toLowerCase();
    for (var i = 0; i < DATA.tools.length; i++) if (DATA.tools[i].slug === slug) return DATA.tools[i];
    return null;
  }

  function runScripts(container){
    var scripts = container.querySelectorAll('script');
    scripts = Array.prototype.slice.call(scripts);
    scripts.forEach(function(old){
      var s = document.createElement('script');
      if (old.src){ s.src = old.src; } else { s.textContent = old.textContent; }
      old.parentNode.replaceChild(s, old);
    });
  }

  function openTool(slug, chainHint){
    var t = toolBySlug(slug);
    if (!t){
      println('Unknown tool "' + slug + '". Try "list".');
      return Promise.resolve();
    }
    println('Loading ' + t.slug + ' …');
    return fetch(SITE + 'terminal/tools/' + encodeURIComponent(t.slug) + '/', { credentials: 'same-origin' })
      .then(function(r){ if (!r.ok) throw 0; return r.text(); })
      .then(function(html){
        var doc = new DOMParser().parseFromString(html, 'text/html');
        var src = doc.querySelector('#tool-' + CSS.escape(t.slug));
        preview.innerHTML = '';
        if (!src){ preview.innerHTML = '<p>Calculator unavailable here — <a href="' + SITE + 'terminal/tools/' + encodeURIComponent(t.slug) + '/">open the full page</a>.</p>'; }
        else {
          var h = document.createElement('h2'); h.textContent = t.title;
          var link = document.createElement('p');
          var a = document.createElement('a'); a.href = SITE + 'terminal/tools/' + encodeURIComponent(t.slug) + '/'; a.textContent = 'Open full page';
          link.appendChild(a);
          preview.appendChild(h); preview.appendChild(link);
          var body = document.createElement('div');
          body.innerHTML = src.innerHTML;
          preview.appendChild(body);
          runScripts(preview);
          if (chainHint){
            var sels = preview.querySelectorAll('select');
            for (var i = 0; i < sels.length; i++){
              var opts = sels[i].options;
              for (var j = 0; j < opts.length; j++){
                if (opts[j].text.toLowerCase().indexOf(String(chainHint).toLowerCase()) >= 0){ sels[i].selectedIndex = j; break; }
              }
            }
          }
        }
        fullLink.href = SITE + 'terminal/tools/' + encodeURIComponent(t.slug) + '/';
        try { history.pushState({ tool: t.slug }, '', SITE.replace(/\/$/, '') + '/terminal/?tool=' + encodeURIComponent(t.slug)); } catch (e){}
        println('Opened in preview → ' + t.slug);
      })
      .catch(function(){ println('Could not load tool page (offline?). Try its full page directly.'); });
  }

  function cmdGlossary(term){
    term = (term || '').trim().toLowerCase().replace(/\s+/g, '-');
    if (!term){ println('Usage: glossary <term>   e.g. glossary staking'); return Promise.resolve(); }
    println('Fetching /glossary/' + term + '/ …');
    return fetch(SITE + 'glossary/' + encodeURIComponent(term) + '/', { credentials: 'same-origin' })
      .then(function(r){ if (!r.ok) throw 0; return r.text(); })
      .then(function(html){
        var doc = new DOMParser().parseFromString(html, 'text/html');
        var d = doc.querySelector('meta[name="description"]');
        var txt = d ? d.getAttribute('content') : '';
        if (!txt){
          var p = doc.querySelector('.entry-content p, .w3d-content p');
          txt = p ? p.textContent : '';
        }
        txt = txt.replace(/\s+/g, ' ').trim().slice(0, 400);
        println(txt ? txt : 'No excerpt found.');
        println('Full page: ' + SITE + 'glossary/' + encodeURIComponent(term) + '/');
      })
      .catch(function(){ println('Term not found. Try "list" for tools or check spelling.'); });
  }

  function cmdChain(slug){
    slug = (slug || '').toLowerCase();
    var found = null;
    for (var i = 0; i < DATA.chains.length; i++){
      if (DATA.chains[i].slug === slug){ found = DATA.chains[i]; break; }
    }
    if (!found){ println('Unknown chain. Try: ' + DATA.chains.map(function(c){ return c.slug; }).join(', ')); return Promise.resolve(); }
    if (found.score === null || found.score === undefined){
      println(found.name + ': preliminary profile — full audit pending. See ' + SITE + 'chains/' + found.slug + '/');
    } else {
      var p = found.pillars || {};
      println(found.name + ' — composite ' + found.score + '/100  (infra ' + (p.infrastructure ?? '?') + ' · capital ' + (p.capital ?? '?') + ' · gov ' + (p.governance ?? '?') + ' · soft ' + (p.software ?? '?') + ')');
      println('Full audit: ' + SITE + 'chains/' + found.slug + '/');
    }
    return Promise.resolve();
  }

  function cmdHelp(){
    println('Commands: help · list · open <slug> · glossary <term> · chain <slug> · clear · about');
    println('Tools (' + DATA.tools.length + '):');
    DATA.tools.forEach(function(t){ println('  ' + t.slug + '  — ' + t.title); });
    return Promise.resolve();
  }

  function cmdList(){
    DATA.tools.forEach(function(t){
      var cat = t.category ? ' [' + t.category + ']' : '';
      println('  ' + t.slug + cat + '  — ' + t.title);
    });
    return Promise.resolve();
  }

  function cmdAbout(){
    println('W3D Terminal — open-source decentralization toolkit (MIT).');
    println('Method: 4 pillars (infrastructure 30 / capital 25 / governance 25 / software 20).');
    println('Code + data: https://github.com/shoyebjhd/web3decentralization');
    return Promise.resolve();
  }

  var pending = Promise.resolve();
  function exec(line){
    var parts = line.trim().split(/\s+/).filter(Boolean);
    if (!parts.length) return Promise.resolve();
    var c = parts[0].toLowerCase(), arg = parts.slice(1).join(' ');
    if (c === 'help') return cmdHelp();
    if (c === 'list' || c === 'ls') return cmdList();
    if (c === 'open' || c === 'tool'){ if (!arg){ println('Usage: open <slug>'); return Promise.resolve(); } return openTool(arg.split(/\s+/)[0]); }
    if (c === 'glossary' || c === 'g') return cmdGlossary(arg);
    if (c === 'chain' || c === 'c') return cmdChain(arg.split(/\s+/)[0]);
    if (c === 'clear' || c === 'cls'){ term.clear(); return Promise.resolve(); }
    if (c === 'about') return cmdAbout();
    println('Unknown command "' + parts[0] + '". Try "help".');
    return Promise.resolve();
  }

  term.onKey(function(ev){
    var k = ev.key, e = ev.domEvent;
    if (e.key === 'Enter'){ term.write('\r\n'); var line = buf; buf = ''; if (line.trim()){ hist.unshift(line); hi = -1; } pending = pending.then(function(){ return exec(line); }).then(printPrompt); }
    else if (e.key === 'Backspace'){ if (buf.length){ buf = buf.slice(0, -1); term.write('\b \b'); } }
    else if (e.key === 'ArrowUp'){ if (hi + 1 < hist.length){ hi++; buf = hist[hi]; term.write('\r\x1b[K' + PROMPT + buf); } }
    else if (e.key === 'ArrowDown'){ hi = Math.max(-1, hi - 1); buf = hi >= 0 ? hist[hi] : ''; term.write('\r\x1b[K' + PROMPT + buf); }
    else if (e.key === 'l' && e.ctrlKey){ term.clear(); term.write(PROMPT + buf); }
    else if (e.key === 'c' && e.ctrlKey){ buf = ''; term.write('^C\r\n' + PROMPT); }
    else if (k.length === 1 && !e.ctrlKey && !e.metaKey){ buf += k; term.write(k); }
  });

  term.writeln('W3D Terminal — type "help" to begin. ' + DATA.tools.length + ' tools loading…');

  fetch(DATA_URL, { credentials: 'same-origin' })
    .then(function(r){ if (!r.ok) throw 0; return r.json(); })
    .then(function(j){ DATA = j; term.writeln(DATA.tools.length + ' tools ready. Try: open nakamoto-coefficient'); })
    .catch(function(){ term.writeln('Data file unreachable — tool pages still work directly.'); })
    .then(function(){
      var q = new URLSearchParams(window.location.search);
      var t0 = q.get('tool');
      if (t0){ openTool(t0, q.get('chain')).then(printPrompt); }
      else { printPrompt(); }
    });

  termBox.addEventListener('click', function(){ term.focus(); });

  grid.addEventListener('click', function(e){
    var b = e.target.closest ? e.target.closest('.w3d-term-open') : null;
    if (!b) return;
    term.focus();
    pending = pending.then(function(){ return openTool(b.getAttribute('data-slug')); }).then(printPrompt);
  });

  filter.addEventListener('input', function(){
    var q = filter.value.trim().toLowerCase();
    var cards = grid.querySelectorAll('.w3d-learn-card');
    var first = null;
    cards.forEach(function(card){
      var hit = !q || (card.getAttribute('data-slug') + ' ' + card.getAttribute('data-title')).toLowerCase().indexOf(q) >= 0;
      card.style.display = hit ? '' : 'none';
      if (hit && !first) first = card;
    });
    filter.dataset.top = first ? first.getAttribute('data-slug') : '';
  });
  filter.addEventListener('keydown', function(e){
    if (e.key === 'Enter' && filter.dataset.top){
      term.focus();
      var slug = filter.dataset.top;
      pending = pending.then(function(){ return openTool(slug); }).then(printPrompt);
    }
  });
}
})();
</script>

<?php
get_footer();
