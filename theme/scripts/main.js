!(function () {
  'use strict';
  var t,
    e = {
      493: function (t, e, s) {
        class i {
          constructor(t) {
            (this.element = t),
              (this.options = { treshold: 0.1, autoHide: !0 }),
              (this.scrollPosition = 0),
              (this.lastScrollPosition = 0),
              (this.html = document.documentElement),
              this.init(),
              this.initNavMobile();
          }
          init() {
            this.setOptions(),
              window.addEventListener('scroll', this.onScroll.bind(this));
          }
          setOptions() {
            'treshold' in this.element.dataset &&
              (this.options.treshold = this.element.dataset.treshold),
              'autoHide' in this.element.dataset &&
                (this.options.autoHide = !1);
          }
          onScroll() {
            (this.lastScrollPosition = this.scrollPosition),
              (this.scrollPosition = document.scrollingElement.scrollTop),
              this.setHeaderState(),
              this.setDirections();
          }
          setHeaderState() {
            this.scrollPosition >
              document.scrollingElement.scrollHeight * this.options.treshold &&
            !this.options.autoHide
              ? this.html.classList.add('header-is-hidden')
              : this.html.classList.remove('header-is-hidden');
          }
          setDirections() {
            this.scrollPosition >= this.lastScrollPosition
              ? (this.html.classList.add('is-scrolling-down'),
                this.html.classList.remove('is-scrolling-up'))
              : (this.html.classList.add('is-scrolling-up'),
                this.html.classList.remove('is-scrolling-down'));
          }
          initNavMobile() {
            this.element
              .querySelector('.js-toggle')
              .addEventListener('click', this.onToggleNav.bind(this));
          }
          onToggleNav() {
            this.html.classList.toggle('nav-is-active');
          }
        }
        var n = s(59);
        class o {
          constructor(t) {
            (this.element = t),
              (this.options = {
                slidesPerView: 1,
                spaceBetween: 20,
                direction: 'horizontal',
                pagination: {
                  el: this.element.querySelector('.custom-pagination'),
                },
                navigation: {
                  nextEl: this.element.querySelector('.swiper-button-next'),
                  prevEl: this.element.querySelector('.swiper-button-prev'),
                },
              }),
              this.init();
          }
          init() {
            console.log('Initialisation de ma composante Carousel'),
              this.setOptions(),
              new n.A(this.element, this.options);
          }
          setOptions() {
            'split' in this.element.dataset &&
              (this.options.breakpoints = { 768: { slidesPerView: 2.5 } }),
              'autoplay' in this.element.dataset &&
                (this.options.autoplay = {
                  delay: 5e3,
                  pauseOnMouseEnter: !0,
                  disableOnInteraction: !1,
                }),
              'loop' in this.element.dataset && (this.options.loop = !0),
              'slides' in this.element.dataset &&
                (this.options.slidesPerView =
                  this.element.dataset.slides || this.options.slidesPerView),
              'direction' in this.element.dataset &&
                (this.options.direction = this.element.dataset.direction),
              'space' in this.element.dataset &&
                (this.options.spaceBetween = this.element.dataset.space);
          }
        }
        class l {
          constructor(t) {
            (this.element = t),
              (this.options = { rootMargin: '0px' }),
              this.init();
          }
          init() {
            const t = new IntersectionObserver(
                this.watch.bind(this),
                this.options
              ),
              e = this.element.querySelectorAll('[data-scrolly]');
            for (let s = 0; s < e.length; s++) {
              const i = e[s];
              t.observe(i);
            }
          }
          watch(t, e) {
            for (let s = 0; s < t.length; s++) {
              const i = t[s],
                n = i.target;
              i.isIntersecting
                ? (n.classList.add('is-active'),
                  'noRepeat' in this.element.dataset &&
                    (e.unobserve(n), console.log('element non observer')))
                : n.classList.remove('is-active');
            }
          }
        }
        class a {
          constructor(t) {
            (this.element = t),
              (this.options = { controls: 1 }),
              (this.videocontainer = this.element.querySelector('.js-video')),
              (this.poster = this.element.querySelector('.js-poster')),
              (this.videoId = this.element.dataset.videoId),
              (this.autoplay = this.poster ? 1 : 0),
              (this.playerReady = !1),
              a.instances.push(this),
              this.videoId
                ? a.loadScript()
                : console.error('Vous devez spécifier un id');
          }
          static loadScript() {
            if (!a.scriptIsLoading) {
              a.scriptIsLoading = !0;
              const t = document.createElement('script');
              (t.src = 'https://www.youtube.com/iframe_api'),
                document.body.appendChild(t);
            }
          }
          init() {
            this.setOptions(),
              (this.initPlayer = this.initPlayer.bind(this)),
              this.poster
                ? this.element.addEventListener('click', this.initPlayer)
                : this.initPlayer();
          }
          setOptions() {
            'noControls' in this.element.dataset && (this.options.controls = 0);
          }
          initPlayer(t) {
            t && this.element.removeEventListener('click', this.initPlayer),
              (this.player = new YT.Player(this.videocontainer, {
                height: '100%',
                width: '100%',
                videoId: this.videoId,
                playerVars: {
                  rel: 0,
                  autoplay: this.autoplay,
                  controls: this.options.controls,
                },
                events: {
                  onReady: () => {
                    (this.playerReady = !0),
                      new IntersectionObserver(this.watch.bind(this), {
                        rootMargin: '0px 0px 0px 0px',
                      }).observe(this.element);
                  },
                  onStateChange: (t) => {
                    t.data == YT.PlayerState.PLAYING
                      ? a.pauseAll(this)
                      : t.data == YT.PlayerState.ENDED &&
                        (this.player.seekTo(0), this.player.pauseVideo());
                  },
                },
              }));
          }
          watch(t) {
            this.playerReady &&
              !t[0].isIntersecting &&
              this.player.pauseVideo();
          }
          static initAll() {
            document.documentElement.classList.add('is-video-ready');
            for (let t = 0; t < a.instances.length; t++) a.instances[t].init();
          }
          static pauseAll(t) {
            for (let e = 0; e < a.instances.length; e++) {
              const s = a.instances[e];
              s.playerReady && s !== t && s.player.pauseVideo();
            }
          }
        }
        (a.instances = []), (window.onYouTubeIframeAPIReady = a.initAll);
        class r {
          constructor(t) {
            (this.element = t),
              (this.options = { notClosing: !1 }),
              (this.numberOpen = 0),
              this.init();
          }
          init() {
            console.log('Initialisation de ma composante Accordéon'),
              this.setOptions();
            let t = this.element.querySelectorAll('.js-header');
            for (let e = 0; e < t.length; e++) {
              const s = t[e];
              'autoOpen' in s.dataset &&
                (s.classList.add('is-active_ac'), this.numberOpen++),
                s.addEventListener('click', this.openAccordion.bind(this));
            }
          }
          setOptions() {
            'notClosing' in this.element.dataset &&
              (this.options.notClosing = !0);
          }
          openAccordion(t) {
            if ((t = t.currentTarget).classList.contains('is-active_ac'))
              t.classList.remove('is-active_ac');
            else {
              if (!this.options.notClosing) {
                let t = this.element.querySelectorAll('.js-header');
                for (let e = 0; e < t.length; e++) {
                  const s = t[e];
                  this.numberOpen <= 1 && s.classList.remove('is-active_ac');
                }
              }
              t.classList.add('is-active_ac');
            }
          }
        }
        class c {
          constructor() {
            (this.componentInstances = []),
              (this.componentList = {
                Header: i,
                Carousel: o,
                Scrolly: l,
                Youtube: a,
                Accordion: r,
              }),
              this.init();
          }
          init() {
            const t = document.querySelectorAll('[data-component]');
            for (let e = 0; e < t.length; e++) {
              const s = t[e],
                i = s.dataset.component;
              if (this.componentList[i]) {
                const t = new this.componentList[i](s);
                this.componentInstances.push(t);
              } else console.log(`La composante ${i} n'existe pas`);
            }
          }
        }
        class h {
          static load(t) {
            (window.iconsPath = window.iconsPath || ''),
              (t = t || iconsPath + 'assets/icons.svg'),
              fetch(t)
                .then((t) => {
                  if (t.ok) return t.text();
                  throw new Error('Le fichier icons est introuvable.');
                })
                .then((t) => {
                  const e = document.createElement('div');
                  (e.style.display = 'none'),
                    (e.innerHTML = t),
                    document.body.appendChild(e);
                })
                .catch((t) => {
                  console.log(`Une erreur est survenur : ${t.message}`);
                });
          }
        }
        new (class {
          constructor() {
            this.init();
          }
          init() {
            document.documentElement.classList.add('has-js'), new c(), h.load();
          }
        })();
      },
    },
    s = {};
  function i(t) {
    var n = s[t];
    if (void 0 !== n) return n.exports;
    var o = (s[t] = { exports: {} });
    return e[t](o, o.exports, i), o.exports;
  }
  (i.m = e),
    (t = []),
    (i.O = function (e, s, n, o) {
      if (!s) {
        var l = 1 / 0;
        for (h = 0; h < t.length; h++) {
          (s = t[h][0]), (n = t[h][1]), (o = t[h][2]);
          for (var a = !0, r = 0; r < s.length; r++)
            (!1 & o || l >= o) &&
            Object.keys(i.O).every(function (t) {
              return i.O[t](s[r]);
            })
              ? s.splice(r--, 1)
              : ((a = !1), o < l && (l = o));
          if (a) {
            t.splice(h--, 1);
            var c = n();
            void 0 !== c && (e = c);
          }
        }
        return e;
      }
      o = o || 0;
      for (var h = t.length; h > 0 && t[h - 1][2] > o; h--) t[h] = t[h - 1];
      t[h] = [s, n, o];
    }),
    (i.d = function (t, e) {
      for (var s in e)
        i.o(e, s) &&
          !i.o(t, s) &&
          Object.defineProperty(t, s, { enumerable: !0, get: e[s] });
    }),
    (i.o = function (t, e) {
      return Object.prototype.hasOwnProperty.call(t, e);
    }),
    (function () {
      var t = { 792: 0 };
      i.O.j = function (e) {
        return 0 === t[e];
      };
      var e = function (e, s) {
          var n,
            o,
            l = s[0],
            a = s[1],
            r = s[2],
            c = 0;
          if (
            l.some(function (e) {
              return 0 !== t[e];
            })
          ) {
            for (n in a) i.o(a, n) && (i.m[n] = a[n]);
            if (r) var h = r(i);
          }
          for (e && e(s); c < l.length; c++)
            (o = l[c]), i.o(t, o) && t[o] && t[o][0](), (t[o] = 0);
          return i.O(h);
        },
        s = (self.webpackChunktimtools = self.webpackChunktimtools || []);
      s.forEach(e.bind(null, 0)), (s.push = e.bind(null, s.push.bind(s)));
    })();
  var n = i.O(void 0, [96], function () {
    return i(493);
  });
  n = i.O(n);
})();
//# sourceMappingURL=main.js.map
