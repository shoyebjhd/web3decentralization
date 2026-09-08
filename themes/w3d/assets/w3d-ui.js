/**
 * W3D front-end UI: sticky header, mobile nav, reading progress,
 * count-up stats and scroll-reveal. Deferred, dependency-free.
 */
(function () {
	'use strict';

	var reduceMotion = window.matchMedia &&
		window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	function ready(fn) {
		if (document.readyState !== 'loading') {
			fn();
		} else {
			document.addEventListener('DOMContentLoaded', fn);
		}
	}

	ready(function () {

		/* ---------- Sticky header state ---------- */
		var header = document.querySelector('.w3d-header');
		if (header) {
			var onScrollH = function () {
				if (window.scrollY > 8) {
					header.classList.add('w3d-scrolled');
				} else {
					header.classList.remove('w3d-scrolled');
				}
			};
			window.addEventListener('scroll', onScrollH, { passive: true });
			onScrollH();
		}

		/* ---------- Mobile menu ---------- */
		var toggle = document.querySelector('.w3d-nav-toggle');
		var nav = document.getElementById('w3d-nav');
		var setNav = function (open) {
			toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
			header.classList.toggle('w3d-nav-open', open);
			var lbl = toggle.querySelector('.screen-reader-text');
			if (lbl) {
				lbl.textContent = open ? 'Close menu' : 'Open menu';
			}
		};
		if (toggle && nav && header) {
			toggle.addEventListener('click', function () {
				setNav(toggle.getAttribute('aria-expanded') !== 'true');
			});

			nav.addEventListener('click', function (e) {
				if (e.target.closest('a') && window.innerWidth <= 920) {
					setNav(false);
				}
			});

			document.addEventListener('keydown', function (e) {
				if (e.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
					setNav(false);
					toggle.focus();
				}
			});

			document.addEventListener('click', function (e) {
				if (toggle.getAttribute('aria-expanded') === 'true' && !header.contains(e.target)) {
					setNav(false);
				}
			});
		}

		/* ---------- Content hardening: tables, code blocks ---------- */
		var scrollCount = 0;
		document.querySelectorAll('.w3d-content table, .w3d-page-full table, .entry-content table').forEach(function (t) {
			var parent = t.parentNode;
			if (parent && parent.classList && parent.classList.contains('w3d-table-scroll')) {
				return;
			}
			scrollCount += 1;
			var label = 'Scrollable table';
			var heading = t.previousElementSibling;
			while (heading && !/^H[2-4]$/i.test(heading.tagName)) {
				heading = heading.previousElementSibling;
			}
			if (heading && heading.textContent) {
				label += ': ' + heading.textContent.trim().slice(0, 60);
			}
			if (scrollCount > 1) {
				label += ' (' + scrollCount + ')';
			}
			var wrap = document.createElement('div');
			wrap.className = 'w3d-table-scroll';
			wrap.tabIndex = 0;
			wrap.setAttribute('role', 'region');
			wrap.setAttribute('aria-label', label);
			parent.insertBefore(wrap, t);
			wrap.appendChild(t);
		});

		var isLight = function (el) {
			var bg = window.getComputedStyle(el).backgroundColor;
			var m = bg && bg.match(/rgba?\((\d+)[\s,]+(\d+)[\s,]+(\d+)/);
			if (!m) { return false; }
			var l = 0.2126 * m[1] + 0.7152 * m[2] + 0.0722 * m[3];
			return l > 138;
		};

		document.querySelectorAll('.w3d-content pre, .entry-content pre').forEach(function (pre) {
			if (isLight(pre)) {
				pre.style.backgroundColor = '#0c0d18';
				pre.style.color = '#d5dbe8';
			}
			if (pre.scrollWidth > pre.clientWidth) {
				pre.setAttribute('tabindex', '0');
				pre.setAttribute('aria-label', 'Code block, scrollable');
			}
		});

		/* ---------- Reading progress ---------- */
		var progress = document.querySelector('.w3d-progress');
		if (progress && !reduceMotion) {
			var ticking = false;
			var updateProgress = function () {
				var doc = document.documentElement;
				var max = doc.scrollHeight - window.innerHeight;
				var pct = max > 0 ? (window.scrollY / max) * 100 : 0;
				progress.style.width = pct.toFixed(2) + '%';
				ticking = false;
			};
			window.addEventListener('scroll', function () {
				if (!ticking) {
					ticking = true;
					window.requestAnimationFrame(updateProgress);
				}
			}, { passive: true });
		}

		/* ---------- Count-up stats ---------- */
		var counters = document.querySelectorAll('.w3d-stat strong[data-count]');
		if (counters.length) {
			for (var i = 0; i < counters.length; i++) {
				(function (el) {
					var target = parseFloat(el.getAttribute('data-count'));
					if (isNaN(target) || reduceMotion) {
						el.textContent = String(target);
						return;
					}
					var dur = 900;
					var start = null;
					var fmt = function (v) {
						return target % 1 !== 0 ? v.toFixed(1) : Math.round(v).toString();
					};
					var step = function (ts) {
						if (start === null) { start = ts; }
						var p = Math.min((ts - start) / dur, 1);
						var eased = 1 - Math.pow(1 - p, 3);
						el.textContent = fmt(target * eased);
						if (p < 1) {
							window.requestAnimationFrame(step);
						} else {
							el.textContent = fmt(target);
						}
					};
					window.requestAnimationFrame(step);
				})(counters[i]);
			}
		}

		/* ---------- Scroll reveal ---------- */
		var reveals = document.querySelectorAll('.w3d-reveal');
		if (reveals.length) {
			if (reduceMotion || !('IntersectionObserver' in window)) {
				for (var j = 0; j < reveals.length; j++) {
					reveals[j].classList.add('w3d-in');
				}
			} else {
				var io = new IntersectionObserver(function (entries) {
					entries.forEach(function (entry) {
						if (entry.isIntersecting) {
							entry.target.classList.add('w3d-in');
							io.unobserve(entry.target);
						}
					});
				}, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
				for (var k = 0; k < reveals.length; k++) {
					io.observe(reveals[k]);
				}
			}
		}
	});

	window.w3dUiReady = true;
})();