/*! dom-to-image-more 26-04-2023 */
!(function (u) {
    "use strict";
    const f = (function () {
            let e = 0;
            return {
                escape: function (e) {
                    return e.replace(/([.*+?^${}()|[]\/\\])/g, "\\$1");
                },
                isDataUrl: function (e) {
                    return -1 !== e.search(/^(data:)/);
                },
                canvasToBlob: function (t) {
                    if (t.toBlob)
                        return new Promise(function (e) {
                            t.toBlob(e);
                        });
                    return (function (r) {
                        return new Promise(function (e) {
                            var t = s(r.toDataURL().split(",")[1]),
                                n = t.length,
                                o = new Uint8Array(n);
                            for (let e = 0; e < n; e++) o[e] = t.charCodeAt(e);
                            e(new Blob([o], { type: "image/png" }));
                        });
                    })(t);
                },
                resolveUrl: function (e, t) {
                    var n = document.implementation.createHTMLDocument(),
                        o = n.createElement("base"),
                        r = (n.head.appendChild(o), n.createElement("a"));
                    return (
                        n.body.appendChild(r),
                        (o.href = t),
                        (r.href = e),
                        r.href
                    );
                },
                getAndEncode: function (u) {
                    let e = c.impl.urlCache.find(function (e) {
                        return e.url === u;
                    });
                    e ||
                        ((e = { url: u, promise: null }),
                        c.impl.urlCache.push(e));
                    null === e.promise &&
                        (c.impl.options.cacheBust &&
                            (u +=
                                (/\?/.test(u) ? "&" : "?") +
                                new Date().getTime()),
                        (e.promise = new Promise(function (t) {
                            const e = c.impl.options.httpTimeout,
                                n = new XMLHttpRequest();
                            (n.onreadystatechange = function () {
                                if (4 === n.readyState)
                                    if (200 !== n.status)
                                        o
                                            ? t(o)
                                            : i(
                                                  `cannot fetch resource: ${u}, status: ` +
                                                      n.status
                                              );
                                    else {
                                        const e = new FileReader();
                                        (e.onloadend = function () {
                                            t(e.result);
                                        }),
                                            e.readAsDataURL(n.response);
                                    }
                            }),
                                (n.ontimeout = function () {
                                    o
                                        ? t(o)
                                        : i(
                                              `timeout of ${e}ms occured while fetching resource: ` +
                                                  u
                                          );
                                }),
                                (n.responseType = "blob"),
                                (n.timeout = e),
                                c.impl.options.useCredentials &&
                                    (n.withCredentials = !0),
                                n.open("GET", u, !0),
                                n.send();
                            let o;
                            var r;
                            function i(e) {
                                console.error(e), t("");
                            }
                            c.impl.options.imagePlaceholder &&
                                (r =
                                    c.impl.options.imagePlaceholder.split(
                                        /,/
                                    )) &&
                                r[1] &&
                                (o = r[1]);
                        })));
                    return e.promise;
                },
                uid: function () {
                    return (
                        "u" +
                        (
                            "0000" +
                            ((Math.random() * Math.pow(36, 4)) << 0).toString(
                                36
                            )
                        ).slice(-4) +
                        e++
                    );
                },
                delay: function (n) {
                    return function (t) {
                        return new Promise(function (e) {
                            setTimeout(function () {
                                e(t);
                            }, n);
                        });
                    };
                },
                asArray: function (t) {
                    var n = [],
                        o = t.length;
                    for (let e = 0; e < o; e++) n.push(t[e]);
                    return n;
                },
                escapeXhtml: function (e) {
                    return e
                        .replace(/%/g, "%25")
                        .replace(/#/g, "%23")
                        .replace(/\n/g, "%0A");
                },
                makeImage: function (o) {
                    return "data:," !== o
                        ? new Promise(function (e, t) {
                              const n = new Image();
                              c.impl.options.useCredentials &&
                                  (n.crossOrigin = "use-credentials"),
                                  (n.onload = function () {
                                      window && window.requestAnimationFrame
                                          ? window.requestAnimationFrame(
                                                function () {
                                                    e(n);
                                                }
                                            )
                                          : e(n);
                                  }),
                                  (n.onerror = t),
                                  (n.src = o);
                          })
                        : Promise.resolve();
                },
                width: function (e) {
                    var t = i(e, "width");
                    if (!isNaN(t)) return t;
                    var t = i(e, "border-left-width"),
                        n = i(e, "border-right-width");
                    return e.scrollWidth + t + n;
                },
                height: function (e) {
                    var t = i(e, "height");
                    if (!isNaN(t)) return t;
                    var t = i(e, "border-top-width"),
                        n = i(e, "border-bottom-width");
                    return e.scrollHeight + t + n;
                },
                getWindow: t,
                isElement: r,
                isElementHostForOpenShadowRoot: function (e) {
                    return r(e) && null !== e.shadowRoot;
                },
                isShadowRoot: n,
                isInShadowRoot: o,
                isHTMLElement: function (e) {
                    return e instanceof t(e).HTMLElement;
                },
                isHTMLCanvasElement: function (e) {
                    return e instanceof t(e).HTMLCanvasElement;
                },
                isHTMLInputElement: function (e) {
                    return e instanceof t(e).HTMLInputElement;
                },
                isHTMLImageElement: function (e) {
                    return e instanceof t(e).HTMLImageElement;
                },
                isHTMLLinkElement: function (e) {
                    return e instanceof t(e).HTMLLinkElement;
                },
                isHTMLScriptElement: function (e) {
                    return e instanceof t(e).HTMLScriptElement;
                },
                isHTMLStyleElement: function (e) {
                    return e instanceof t(e).HTMLStyleElement;
                },
                isHTMLTextAreaElement: function (e) {
                    return e instanceof t(e).HTMLTextAreaElement;
                },
                isShadowSlotElement: function (e) {
                    return o(e) && e instanceof t(e).HTMLSlotElement;
                },
                isSVGElement: function (e) {
                    return e instanceof t(e).SVGElement;
                },
                isSVGRectElement: function (e) {
                    return e instanceof t(e).SVGRectElement;
                },
                isDimensionMissing: function (e) {
                    return isNaN(e) || e <= 0;
                },
            };
            function t(e) {
                e = e ? e.ownerDocument : void 0;
                return (e ? e.defaultView : void 0) || u || window;
            }
            function n(e) {
                return e instanceof t(e).ShadowRoot;
            }
            function o(e) {
                return (
                    null !== e &&
                    Object.prototype.hasOwnProperty.call(e, "getRootNode") &&
                    n(e.getRootNode())
                );
            }
            function r(e) {
                return e instanceof t(e).Element;
            }
            function i(t, n) {
                if (t.nodeType === a) {
                    let e = h(t).getPropertyValue(n);
                    if ("px" === e.slice(-2))
                        return (e = e.slice(0, -2)), parseFloat(e);
                }
                return NaN;
            }
        })(),
        r = (function () {
            const o = /url\(['"]?([^'"]+?)['"]?\)/g;
            return {
                inlineAll: function (t, o, r) {
                    if (!e(t)) return Promise.resolve(t);
                    return Promise.resolve(t)
                        .then(n)
                        .then(function (e) {
                            let n = Promise.resolve(t);
                            return (
                                e.forEach(function (t) {
                                    n = n.then(function (e) {
                                        return i(e, t, o, r);
                                    });
                                }),
                                n
                            );
                        });
                },
                shouldProcess: e,
                impl: { readUrls: n, inline: i },
            };
            function e(e) {
                return -1 !== e.search(o);
            }
            function n(e) {
                for (var t, n = []; null !== (t = o.exec(e)); ) n.push(t[1]);
                return n.filter(function (e) {
                    return !f.isDataUrl(e);
                });
            }
            function i(n, o, t, e) {
                return Promise.resolve(o)
                    .then(function (e) {
                        return t ? f.resolveUrl(e, t) : e;
                    })
                    .then(e || f.getAndEncode)
                    .then(function (e) {
                        return n.replace(
                            ((t = o),
                            new RegExp(
                                `(url\\(['"]?)(${f.escape(t)})(['"]?\\))`,
                                "g"
                            )),
                            `$1${e}$3`
                        );
                        var t;
                    });
            }
        })(),
        e = {
            resolveAll: function () {
                return t()
                    .then(function (e) {
                        return Promise.all(
                            e.map(function (e) {
                                return e.resolve();
                            })
                        );
                    })
                    .then(function (e) {
                        return e.join("\n");
                    });
            },
            impl: { readAll: t },
        };
    function t() {
        return Promise.resolve(f.asArray(document.styleSheets))
            .then(function (e) {
                const n = [];
                return (
                    e.forEach(function (t) {
                        if (
                            Object.prototype.hasOwnProperty.call(
                                Object.getPrototypeOf(t),
                                "cssRules"
                            )
                        )
                            try {
                                f.asArray(t.cssRules || []).forEach(
                                    n.push.bind(n)
                                );
                            } catch (e) {
                                console.error(
                                    "domtoimage: Error while reading CSS rules from " +
                                        t.href,
                                    e.toString()
                                );
                            }
                    }),
                    n
                );
            })
            .then(function (e) {
                return e
                    .filter(function (e) {
                        return e.type === CSSRule.FONT_FACE_RULE;
                    })
                    .filter(function (e) {
                        return r.shouldProcess(e.style.getPropertyValue("src"));
                    });
            })
            .then(function (e) {
                return e.map(t);
            });
        function t(t) {
            return {
                resolve: function () {
                    var e = (t.parentStyleSheet || {}).href;
                    return r.inlineAll(t.cssText, e);
                },
                src: function () {
                    return t.style.getPropertyValue("src");
                },
            };
        }
    }
    const n = {
        inlineAll: function t(e) {
            if (!f.isElement(e)) return Promise.resolve(e);
            return n(e).then(function () {
                return f.isHTMLImageElement(e)
                    ? o(e).inline()
                    : Promise.all(
                          f.asArray(e.childNodes).map(function (e) {
                              return t(e);
                          })
                      );
            });
            function n(o) {
                const e = ["background", "background-image"],
                    t = e.map(function (t) {
                        const e = o.style.getPropertyValue(t),
                            n = o.style.getPropertyPriority(t);
                        return e
                            ? r.inlineAll(e).then(function (e) {
                                  o.style.setProperty(t, e, n);
                              })
                            : Promise.resolve();
                    });
                return Promise.all(t).then(function () {
                    return o;
                });
            }
        },
        impl: { newImage: o },
    };
    function o(n) {
        return {
            inline: function (e) {
                if (f.isDataUrl(n.src)) return Promise.resolve();
                return Promise.resolve(n.src)
                    .then(e || f.getAndEncode)
                    .then(function (t) {
                        return new Promise(function (e) {
                            (n.onload = e), (n.onerror = e), (n.src = t);
                        });
                    });
            },
        };
    }
    const l = {
            copyDefaultStyles: !0,
            imagePlaceholder: void 0,
            cacheBust: !1,
            useCredentials: !1,
            httpTimeout: 3e4,
            styleCaching: "strict",
        },
        c = {
            toSvg: m,
            toPng: function (e, t) {
                return i(e, t).then(function (e) {
                    return e.toDataURL();
                });
            },
            toJpeg: function (e, t) {
                return i(e, t).then(function (e) {
                    return e.toDataURL(
                        "image/jpeg",
                        (t ? t.quality : void 0) || 1
                    );
                });
            },
            toBlob: function (e, t) {
                return i(e, t).then(f.canvasToBlob);
            },
            toPixelData: function (t, e) {
                return i(t, e).then(function (e) {
                    return e
                        .getContext("2d")
                        .getImageData(0, 0, f.width(t), f.height(t)).data;
                });
            },
            toCanvas: i,
            impl: {
                fontFaces: e,
                images: n,
                util: f,
                inliner: r,
                urlCache: [],
                options: {},
            },
        },
        a =
            ("object" == typeof exports && "object" == typeof module
                ? (module.exports = c)
                : (u.domtoimage = c),
            ("undefined" != typeof Node ? Node.ELEMENT_NODE : void 0) || 1),
        h =
            (void 0 !== u ? u.getComputedStyle : void 0) ||
            ("undefined" != typeof window ? window.getComputedStyle : void 0) ||
            globalThis.getComputedStyle,
        s =
            (void 0 !== u ? u.atob : void 0) ||
            ("undefined" != typeof window ? window.atob : void 0) ||
            globalThis.atob;
    function m(e, r) {
        const t = c.impl.util.getWindow(e);
        var n = (r = r || {});
        void 0 === n.copyDefaultStyles
            ? (c.impl.options.copyDefaultStyles = l.copyDefaultStyles)
            : (c.impl.options.copyDefaultStyles = n.copyDefaultStyles),
            void 0 === n.imagePlaceholder
                ? (c.impl.options.imagePlaceholder = l.imagePlaceholder)
                : (c.impl.options.imagePlaceholder = n.imagePlaceholder),
            void 0 === n.cacheBust
                ? (c.impl.options.cacheBust = l.cacheBust)
                : (c.impl.options.cacheBust = n.cacheBust),
            void 0 === n.useCredentials
                ? (c.impl.options.useCredentials = l.useCredentials)
                : (c.impl.options.useCredentials = n.useCredentials),
            void 0 === n.httpTimeout
                ? (c.impl.options.httpTimeout = l.httpTimeout)
                : (c.impl.options.httpTimeout = n.httpTimeout),
            void 0 === n.styleCaching
                ? (c.impl.options.styleCaching = l.styleCaching)
                : (c.impl.options.styleCaching = n.styleCaching);
        let i = [];
        return Promise.resolve(e)
            .then(function (e) {
                if (e.nodeType === a) return e;
                var t = e,
                    n = e.parentNode,
                    o = document.createElement("span");
                return (
                    n.replaceChild(o, t),
                    o.append(e),
                    i.push({ parent: n, child: t, wrapper: o }),
                    o
                );
            })
            .then(function (e) {
                return (function l(t, a, r, s) {
                    const e = a.filter;
                    if (
                        t === d ||
                        f.isHTMLScriptElement(t) ||
                        f.isHTMLStyleElement(t) ||
                        f.isHTMLLinkElement(t) ||
                        (null !== r && e && !e(t))
                    )
                        return Promise.resolve();
                    return Promise.resolve(t)
                        .then(n)
                        .then(function (e) {
                            return i(e, o(t));
                        })
                        .then(function (e) {
                            return u(e, t);
                        });
                    function n(e) {
                        return f.isHTMLCanvasElement(e)
                            ? f.makeImage(e.toDataURL())
                            : e.cloneNode(!1);
                    }
                    function o(e) {
                        return f.isElementHostForOpenShadowRoot(e)
                            ? e.shadowRoot
                            : e;
                    }
                    function i(t, e) {
                        const n = i(e);
                        let o = Promise.resolve();
                        if (0 !== n.length) {
                            const u = h(r(e));
                            f.asArray(n).forEach(function (e) {
                                o = o.then(function () {
                                    return l(e, a, u, s).then(function (e) {
                                        e && t.appendChild(e);
                                    });
                                });
                            });
                        }
                        return o.then(function () {
                            return t;
                        });
                        function r(e) {
                            return f.isShadowRoot(e) ? e.host : e;
                        }
                        function i(e) {
                            return f.isShadowSlotElement(e)
                                ? e.assignedNodes()
                                : e.childNodes;
                        }
                    }
                    function u(s, c) {
                        return !f.isElement(s) || f.isShadowSlotElement(c)
                            ? Promise.resolve(s)
                            : Promise.resolve()
                                  .then(e)
                                  .then(t)
                                  .then(n)
                                  .then(o)
                                  .then(function () {
                                      return s;
                                  });
                        function e() {
                            function o(e, t) {
                                (t.font = e.font),
                                    (t.fontFamily = e.fontFamily),
                                    (t.fontFeatureSettings =
                                        e.fontFeatureSettings),
                                    (t.fontKerning = e.fontKerning),
                                    (t.fontSize = e.fontSize),
                                    (t.fontStretch = e.fontStretch),
                                    (t.fontStyle = e.fontStyle),
                                    (t.fontVariant = e.fontVariant),
                                    (t.fontVariantCaps = e.fontVariantCaps),
                                    (t.fontVariantEastAsian =
                                        e.fontVariantEastAsian),
                                    (t.fontVariantLigatures =
                                        e.fontVariantLigatures),
                                    (t.fontVariantNumeric =
                                        e.fontVariantNumeric),
                                    (t.fontVariationSettings =
                                        e.fontVariationSettings),
                                    (t.fontWeight = e.fontWeight);
                            }
                            function e(e, t) {
                                const n = h(e);
                                n.cssText
                                    ? ((t.style.cssText = n.cssText),
                                      o(n, t.style))
                                    : (y(a, e, n, r, t),
                                      null === r &&
                                          ([
                                              "inset-block",
                                              "inset-block-start",
                                              "inset-block-end",
                                          ].forEach((e) =>
                                              t.style.removeProperty(e)
                                          ),
                                          [
                                              "left",
                                              "right",
                                              "top",
                                              "bottom",
                                          ].forEach((e) => {
                                              t.style.getPropertyValue(e) &&
                                                  t.style.setProperty(e, "0px");
                                          })));
                            }
                            e(c, s);
                        }
                        function t() {
                            const l = f.uid();
                            function t(r) {
                                const i = h(c, r),
                                    u = i.getPropertyValue("content");
                                if ("" !== u && "none" !== u) {
                                    const t = s.getAttribute("class") || "",
                                        n =
                                            (s.setAttribute(
                                                "class",
                                                t + " " + l
                                            ),
                                            document.createElement("style"));
                                    function e() {
                                        const e = `.${l}:` + r,
                                            t = (i.cssText ? n : o)();
                                        return document.createTextNode(
                                            e + `{${t}}`
                                        );
                                        function n() {
                                            return `${i.cssText} content: ${u};`;
                                        }
                                        function o() {
                                            const e = f
                                                .asArray(i)
                                                .map(t)
                                                .join("; ");
                                            return e + ";";
                                            function t(e) {
                                                const t = i.getPropertyValue(e),
                                                    n = i.getPropertyPriority(e)
                                                        ? " !important"
                                                        : "";
                                                return e + ": " + t + n;
                                            }
                                        }
                                    }
                                    n.appendChild(e()), s.appendChild(n);
                                }
                            }
                            [":before", ":after"].forEach(function (e) {
                                t(e);
                            });
                        }
                        function n() {
                            f.isHTMLTextAreaElement(c) &&
                                (s.innerHTML = c.value),
                                f.isHTMLInputElement(c) &&
                                    s.setAttribute("value", c.value);
                        }
                        function o() {
                            f.isSVGElement(s) &&
                                (s.setAttribute(
                                    "xmlns",
                                    "http://www.w3.org/2000/svg"
                                ),
                                f.isSVGRectElement(s)) &&
                                ["width", "height"].forEach(function (e) {
                                    const t = s.getAttribute(e);
                                    t && s.style.setProperty(e, t);
                                });
                        }
                    }
                })(e, r, null, t);
            })
            .then(p)
            .then(g)
            .then(function (t) {
                r.bgcolor && (t.style.backgroundColor = r.bgcolor);
                r.width && (t.style.width = r.width + "px");
                r.height && (t.style.height = r.height + "px");
                r.style &&
                    Object.keys(r.style).forEach(function (e) {
                        t.style[e] = r.style[e];
                    });
                let e = null;
                "function" == typeof r.onclone && (e = r.onclone(t));
                return Promise.resolve(e).then(function () {
                    return t;
                });
            })
            .then(function (e) {
                let n = r.width || f.width(e),
                    o = r.height || f.height(e);
                return Promise.resolve(e)
                    .then(function (e) {
                        return (
                            e.setAttribute(
                                "xmlns",
                                "http://www.w3.org/1999/xhtml"
                            ),
                            new XMLSerializer().serializeToString(e)
                        );
                    })
                    .then(f.escapeXhtml)
                    .then(function (e) {
                        var t =
                            (f.isDimensionMissing(n)
                                ? ' width="100%"'
                                : ` width="${n}"`) +
                            (f.isDimensionMissing(o)
                                ? ' height="100%"'
                                : ` height="${o}"`);
                        return `<svg xmlns="http://www.w3.org/2000/svg"${
                            (f.isDimensionMissing(n) ? "" : ` width="${n}"`) +
                            (f.isDimensionMissing(o) ? "" : ` height="${o}"`)
                        }><foreignObject${t}>${e}</foreignObject></svg>`;
                    })
                    .then(function (e) {
                        return "data:image/svg+xml;charset=utf-8," + e;
                    });
            })
            .then(function (e) {
                for (; 0 < i.length; ) {
                    var t = i.pop();
                    t.parent.replaceChild(t.child, t.wrapper);
                }
                return e;
            })
            .then(function (e) {
                return (
                    (c.impl.urlCache = []),
                    (function () {
                        d && (document.body.removeChild(d), (d = null));
                        w && clearTimeout(w);
                        w = setTimeout(() => {
                            (w = null), (E = {});
                        }, 2e4);
                    })(),
                    e
                );
            });
    }
    function i(r, i) {
        return m(r, (i = i || {}))
            .then(f.makeImage)
            .then(function (e) {
                var t = "number" != typeof i.scale ? 1 : i.scale,
                    n = (function (e, t) {
                        let n = i.width || f.width(e),
                            o = i.height || f.height(e);
                        f.isDimensionMissing(n) &&
                            (n = f.isDimensionMissing(o) ? 300 : 2 * o);
                        f.isDimensionMissing(o) && (o = n / 2);
                        e = document.createElement("canvas");
                        (e.width = n * t),
                            (e.height = o * t),
                            i.bgcolor &&
                                (((t = e.getContext("2d")).fillStyle =
                                    i.bgcolor),
                                t.fillRect(0, 0, e.width, e.height));
                        return e;
                    })(r, t),
                    o = n.getContext("2d");
                return (
                    (o.msImageSmoothingEnabled = !1),
                    (o.imageSmoothingEnabled = !1),
                    e && (o.scale(t, t), o.drawImage(e, 0, 0)),
                    n
                );
            });
    }
    let d = null;
    function p(n) {
        return e.resolveAll().then(function (e) {
            var t;
            return (
                "" !== e &&
                    ((t = document.createElement("style")),
                    n.appendChild(t),
                    t.appendChild(document.createTextNode(e))),
                n
            );
        });
    }
    function g(e) {
        return n.inlineAll(e).then(function () {
            return e;
        });
    }
    function y(e, t, i, u, n) {
        const l = c.impl.options.copyDefaultStyles
                ? (function (t, e) {
                      var e = (function (e) {
                              var t = [];
                              do {
                                  if (e.nodeType === a) {
                                      var n = e.tagName;
                                      if ((t.push(n), v.includes(n))) break;
                                  }
                              } while (((e = e.parentNode), e));
                              return t;
                          })(e),
                          n = (function (e) {
                              return (
                                  "relaxed" !== t.styleCaching
                                      ? e
                                      : e.filter(
                                            (e, t, n) =>
                                                0 === t || t === n.length - 1
                                        )
                              ).join(">");
                          })(e);
                      if (E[n]) return E[n];
                      var o = (function () {
                              if (d) return d.contentWindow;
                              var e = document.characterSet || "UTF-8",
                                  t = document.doctype,
                                  t = t
                                      ? (
                                            `<!DOCTYPE ${n(t.name)} ${n(
                                                t.publicId
                                            )} ` + n(t.systemId)
                                        ).trim() + ">"
                                      : "";
                              return (
                                  ((d = document.createElement("iframe")).id =
                                      "domtoimage-sandbox-" + f.uid()),
                                  (d.style.visibility = "hidden"),
                                  (d.style.position = "fixed"),
                                  document.body.appendChild(d),
                                  (function (e, t, n, o) {
                                      try {
                                          return (
                                              e.contentWindow.document.write(
                                                  t +
                                                      `<html><head><meta charset='${n}'><title>${o}</title></head><body></body></html>`
                                              ),
                                              e.contentWindow
                                          );
                                      } catch (e) {}
                                      var r = document.createElement("meta");
                                      r.setAttribute("charset", n);
                                      try {
                                          var i =
                                                  document.implementation.createHTMLDocument(
                                                      o
                                                  ),
                                              u =
                                                  (i.head.appendChild(r),
                                                  t +
                                                      i.documentElement
                                                          .outerHTML);
                                          return (
                                              e.setAttribute("srcdoc", u),
                                              e.contentWindow
                                          );
                                      } catch (e) {}
                                      return (
                                          e.contentDocument.head.appendChild(r),
                                          (e.contentDocument.title = o),
                                          e.contentWindow
                                      );
                                  })(d, t, e, "domtoimage-sandbox")
                              );
                              function n(e) {
                                  var t;
                                  return e
                                      ? (((t =
                                            document.createElement(
                                                "div"
                                            )).innerText = e),
                                        t.innerHTML)
                                      : "";
                              }
                          })(),
                          e = (function (e, t) {
                              let n = e.body;
                              do {
                                  var o = t.pop(),
                                      o = e.createElement(o);
                                  n.appendChild(o), (n = o);
                              } while (0 < t.length);
                              return (n.textContent = "​"), n;
                          })(o.document, e),
                          o = (function (e, t) {
                              const n = {},
                                  o = e.getComputedStyle(t);
                              return (
                                  f.asArray(o).forEach(function (e) {
                                      n[e] =
                                          "width" === e || "height" === e
                                              ? "auto"
                                              : o.getPropertyValue(e);
                                  }),
                                  n
                              );
                          })(o, e);
                      return (
                          (function (e) {
                              do {
                                  var t = e.parentElement;
                                  null !== t && t.removeChild(e), (e = t);
                              } while (e && "BODY" !== e.tagName);
                          })(e),
                          (E[n] = o)
                      );
                  })(e, t)
                : {},
            s = n.style;
        f.asArray(i).forEach(function (e) {
            var t,
                n = i.getPropertyValue(e),
                o = l[e],
                r = u ? u.getPropertyValue(e) : void 0;
            (n !== o || (u && n !== r)) &&
                ((o = i.getPropertyPriority(e)),
                (r = s),
                (n = n),
                (o = o),
                (t = 0 <= ["background-clip"].indexOf((e = e))),
                o
                    ? (r.setProperty(e, n, o),
                      t && r.setProperty("-webkit-" + e, n, o))
                    : (r.setProperty(e, n),
                      t && r.setProperty("-webkit-" + e, n)));
        });
    }
    let w = null,
        E = {};
    const v = [
        "ADDRESS",
        "ARTICLE",
        "ASIDE",
        "BLOCKQUOTE",
        "DETAILS",
        "DIALOG",
        "DD",
        "DIV",
        "DL",
        "DT",
        "FIELDSET",
        "FIGCAPTION",
        "FIGURE",
        "FOOTER",
        "FORM",
        "H1",
        "H2",
        "H3",
        "H4",
        "H5",
        "H6",
        "HEADER",
        "HGROUP",
        "HR",
        "LI",
        "MAIN",
        "NAV",
        "OL",
        "P",
        "PRE",
        "SECTION",
        "SVG",
        "TABLE",
        "UL",
        "math",
        "svg",
        "BODY",
        "HEAD",
        "HTML",
    ];
})(this);
//# sourceMappingURL=dom-to-image-more.min.js.map
