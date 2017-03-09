/*
@license

dhtmlxGantt v.3.1.1 Stardard
This software is covered by GPL license. You also can obtain Commercial or Enterprise license to use it in non-GPL project - please contact sales@dhtmlx.com. Usage without proper license is prohibited.

(c) Dinamenta, UAB.
*/
function dtmlXMLLoaderObject(t, e, n, i) {
    return this.xmlDoc = "", this.async = "undefined" != typeof n ? n : !0, this.onloadAction = t || null, this.mainObject = e || null, this.waitCall = null, this.rSeed = i || !1, this
}

function callerFunction(t, e) {
    return this.handler = function(n) {
        return n || (n = window.event), t(n, e), !0
    }, this.handler
}

function getAbsoluteLeft(t) {
    return getOffset(t).left
}

function getAbsoluteTop(t) {
    return getOffset(t).top
}

function getOffsetSum(t) {
    for (var e = 0, n = 0; t;) e += parseInt(t.offsetTop), n += parseInt(t.offsetLeft), t = t.offsetParent;
    return {
        top: e,
        left: n
    }
}

function getOffsetRect(t) {
    var e = t.getBoundingClientRect(),
        n = document.body,
        i = document.documentElement,
        a = window.pageYOffset || i.scrollTop || n.scrollTop,
        s = window.pageXOffset || i.scrollLeft || n.scrollLeft,
        r = i.clientTop || n.clientTop || 0,
        o = i.clientLeft || n.clientLeft || 0,
        d = e.top + a - r,
        l = e.left + s - o;
    return {
        top: Math.round(d),
        left: Math.round(l)
    }
}

function getOffset(t) {
    return t.getBoundingClientRect ? getOffsetRect(t) : getOffsetSum(t)
}

function convertStringToBoolean(t) {
    switch ("string" == typeof t && (t = t.toLowerCase()), t) {
        case "1":
        case "true":
        case "yes":
        case "y":
        case 1:
        case !0:
            return !0;
        default:
            return !1
    }
}

function getUrlSymbol(t) {
    return -1 != t.indexOf("?") ? "&" : "?"
}

function dhtmlDragAndDropObject() {
    return window.dhtmlDragAndDrop ? window.dhtmlDragAndDrop : (this.lastLanding = 0, this.dragNode = 0, this.dragStartNode = 0, this.dragStartObject = 0, this.tempDOMU = null, this.tempDOMM = null, this.waitDrag = 0, window.dhtmlDragAndDrop = this, this)
}

function _dhtmlxError() {
    return this.catches || (this.catches = []), this
}

function dhtmlXHeir(t, e) {
    for (var n in e) "function" == typeof e[n] && (t[n] = e[n]);
    return t
}

function dhtmlxDetachEvent(t, e, n) {
    t.removeEventListener ? t.removeEventListener(e, n, !1) : t.detachEvent && t.detachEvent("on" + e, n)
}

function dhtmlxDnD(t, e) {
    e && (this._settings = e), dhtmlxEventable(this), dhtmlxEvent(t, "mousedown", dhtmlx.bind(function(n) {
        e.original_target = {
            target: n.target || n.srcElement
        }, this.dragStart(t, n)
    }, this))
}

function dataProcessor(t) {
    return this.serverProcessor = t, this.action_param = "!nativeeditor_status", this.object = null, this.updatedRows = [], this.autoUpdate = !0, this.updateMode = "cell", this._tMode = "GET", this.post_delim = "_", this._waitMode = 0, this._in_progress = {}, this._invalid = {}, this.mandatoryFields = [], this.messages = [], this.styles = {
        updated: "font-weight:bold;",
        inserted: "font-weight:bold;",
        deleted: "text-decoration : line-through;",
        invalid: "background-color:FFE0E0;",
        invalid_cell: "border-bottom:2px solid red;",
        error: "color:red;",
        clear: "font-weight:normal;text-decoration:none;"
    }, this.enableUTFencoding(!0), dhtmlxEventable(this), this
}
window.dhtmlx || (dhtmlx = function(t) {
        for (var e in t) dhtmlx[e] = t[e];
        return dhtmlx
    }), dhtmlx.extend_api = function(t, e, n) {
        var i = window[t];
        i && (window[t] = function(t) {
            var n;
            if (t && "object" == typeof t && !t.tagName) {
                n = i.apply(this, e._init ? e._init(t) : arguments);
                for (var a in dhtmlx) e[a] && this[e[a]](dhtmlx[a]);
                for (var a in t) e[a] ? this[e[a]](t[a]) : 0 === a.indexOf("on") && this.attachEvent(a, t[a])
            } else n = i.apply(this, arguments);
            return e._patch && e._patch(this), n || this
        }, window[t].prototype = i.prototype, n && dhtmlXHeir(window[t].prototype, n))
    }, dhtmlxAjax = {
        get: function(t, e) {
            var n = new dtmlXMLLoaderObject(!0);
            return n.async = arguments.length < 3, n.waitCall = e, n.loadXML(t), n
        },
        post: function(t, e, n) {
            var i = new dtmlXMLLoaderObject(!0);
            return i.async = arguments.length < 4, i.waitCall = n, i.loadXML(t, !0, e), i
        },
        getSync: function(t) {
            return this.get(t, null, !0)
        },
        postSync: function(t, e) {
            return this.post(t, e, null, !0)
        }
    }, dtmlXMLLoaderObject.count = 0, dtmlXMLLoaderObject.prototype.waitLoadFunction = function(t) {
        var e = !0;
        return this.check = function() {
            if (t && t.onloadAction && (!t.xmlDoc.readyState || 4 == t.xmlDoc.readyState)) {
                if (!e) return;
                e = !1, dtmlXMLLoaderObject.count++, "function" == typeof t.onloadAction && t.onloadAction(t.mainObject, null, null, null, t), t.waitCall && (t.waitCall.call(this, t), t.waitCall = null)
            }
        }, this.check
    }, dtmlXMLLoaderObject.prototype.getXMLTopNode = function(t, e) {
        var n;
        if (this.xmlDoc.responseXML) {
            var i = this.xmlDoc.responseXML.getElementsByTagName(t);
            if (0 === i.length && -1 != t.indexOf(":")) var i = this.xmlDoc.responseXML.getElementsByTagName(t.split(":")[1]);
            n = i[0]
        } else n = this.xmlDoc.documentElement;
        if (n) return this._retry = !1, n;
        if (!this._retry && _isIE) {
            this._retry = !0;
            var e = this.xmlDoc;
            return this.loadXMLString(this.xmlDoc.responseText.replace(/^[\s]+/, ""), !0), this.getXMLTopNode(t, e)
        }
        return dhtmlxError.throwError("LoadXML", "Incorrect XML", [e || this.xmlDoc, this.mainObject]), document.createElement("DIV")
    }, dtmlXMLLoaderObject.prototype.loadXMLString = function(t, e) {
        if (_isIE) this.xmlDoc = new ActiveXObject("Microsoft.XMLDOM"), this.xmlDoc.async = this.async, this.xmlDoc.onreadystatechange = function() {}, this.xmlDoc.loadXML(t);
        else {
            var n = new DOMParser;
            this.xmlDoc = n.parseFromString(t, "text/xml")
        }
        e || (this.onloadAction && this.onloadAction(this.mainObject, null, null, null, this), this.waitCall && (this.waitCall(), this.waitCall = null))
    }, dtmlXMLLoaderObject.prototype.loadXML = function(t, e, n, i) {
        this.rSeed && (t += (-1 != t.indexOf("?") ? "&" : "?") + "a_dhx_rSeed=" + (new Date).valueOf()), this.filePath = t, this.xmlDoc = !_isIE && window.XMLHttpRequest ? new XMLHttpRequest : new ActiveXObject("Microsoft.XMLHTTP"), this.async && (this.xmlDoc.onreadystatechange = new this.waitLoadFunction(this)), this.xmlDoc.open(e ? "POST" : "GET", t, this.async), i ? (this.xmlDoc.setRequestHeader("User-Agent", "dhtmlxRPC v0.1 (" + navigator.userAgent + ")"), this.xmlDoc.setRequestHeader("Content-type", "text/xml")) : e && this.xmlDoc.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), this.xmlDoc.setRequestHeader("X-Requested-With", "XMLHttpRequest"), this.xmlDoc.send(null || n), this.async || new this.waitLoadFunction(this)()
    }, dtmlXMLLoaderObject.prototype.destructor = function() {
        return this._filterXPath = null, this._getAllNamedChilds = null, this._retry = null, this.async = null, this.rSeed = null, this.filePath = null, this.onloadAction = null, this.mainObject = null, this.xmlDoc = null, this.doXPath = null, this.doXPathOpera = null, this.doXSLTransToObject = null, this.doXSLTransToString = null, this.loadXML = null, this.loadXMLString = null, this.doSerialization = null, this.xmlNodeToJSON = null, this.getXMLTopNode = null, this.setXSLParamValue = null, null
    }, dtmlXMLLoaderObject.prototype.xmlNodeToJSON = function(t) {
        for (var e = {}, n = 0; n < t.attributes.length; n++) e[t.attributes[n].name] = t.attributes[n].value;
        e._tagvalue = t.firstChild ? t.firstChild.nodeValue : "";
        for (var n = 0; n < t.childNodes.length; n++) {
            var i = t.childNodes[n].tagName;
            i && (e[i] || (e[i] = []), e[i].push(this.xmlNodeToJSON(t.childNodes[n])))
        }
        return e
    }, dhtmlDragAndDropObject.prototype.removeDraggableItem = function(t) {
        t.onmousedown = null, t.dragStarter = null, t.dragLanding = null
    }, dhtmlDragAndDropObject.prototype.addDraggableItem = function(t, e) {
        t.onmousedown = this.preCreateDragCopy, t.dragStarter = e, this.addDragLanding(t, e)
    }, dhtmlDragAndDropObject.prototype.addDragLanding = function(t, e) {
        t.dragLanding = e
    }, dhtmlDragAndDropObject.prototype.preCreateDragCopy = function(t) {
        return !t && !window.event || 2 != (t || event).button ? window.dhtmlDragAndDrop.waitDrag ? (window.dhtmlDragAndDrop.waitDrag = 0, document.body.onmouseup = window.dhtmlDragAndDrop.tempDOMU, document.body.onmousemove = window.dhtmlDragAndDrop.tempDOMM, !1) : (window.dhtmlDragAndDrop.dragNode && window.dhtmlDragAndDrop.stopDrag(t), window.dhtmlDragAndDrop.waitDrag = 1, window.dhtmlDragAndDrop.tempDOMU = document.body.onmouseup, window.dhtmlDragAndDrop.tempDOMM = document.body.onmousemove, window.dhtmlDragAndDrop.dragStartNode = this, window.dhtmlDragAndDrop.dragStartObject = this.dragStarter, document.body.onmouseup = window.dhtmlDragAndDrop.preCreateDragCopy, document.body.onmousemove = window.dhtmlDragAndDrop.callDrag, window.dhtmlDragAndDrop.downtime = (new Date).valueOf(), t && t.preventDefault ? (t.preventDefault(), !1) : !1) : void 0
    }, dhtmlDragAndDropObject.prototype.callDrag = function(t) {
        t || (t = window.event);
        var e = window.dhtmlDragAndDrop;
        if (!((new Date).valueOf() - e.downtime < 100)) {
            if (!e.dragNode) {
                if (!e.waitDrag) return e.stopDrag(t, !0);
                if (e.dragNode = e.dragStartObject._createDragNode(e.dragStartNode, t), !e.dragNode) return e.stopDrag();
                e.dragNode.onselectstart = function() {
                    return !1
                }, e.gldragNode = e.dragNode, document.body.appendChild(e.dragNode), document.body.onmouseup = e.stopDrag, e.waitDrag = 0, e.dragNode.pWindow = window, e.initFrameRoute()
            }
            if (e.dragNode.parentNode != window.document.body && e.gldragNode) {
                var n = e.gldragNode;
                e.gldragNode.old && (n = e.gldragNode.old), n.parentNode.removeChild(n);
                var i = e.dragNode.pWindow;
                if (n.pWindow && n.pWindow.dhtmlDragAndDrop.lastLanding && n.pWindow.dhtmlDragAndDrop.lastLanding.dragLanding._dragOut(n.pWindow.dhtmlDragAndDrop.lastLanding), _isIE) {
                    var a = document.createElement("Div");
                    a.innerHTML = e.dragNode.outerHTML, e.dragNode = a.childNodes[0]
                } else e.dragNode = e.dragNode.cloneNode(!0);
                e.dragNode.pWindow = window, e.gldragNode.old = e.dragNode, document.body.appendChild(e.dragNode), i.dhtmlDragAndDrop.dragNode = e.dragNode
            }
            e.dragNode.style.left = t.clientX + 15 + (e.fx ? -1 * e.fx : 0) + (document.body.scrollLeft || document.documentElement.scrollLeft) + "px", e.dragNode.style.top = t.clientY + 3 + (e.fy ? -1 * e.fy : 0) + (document.body.scrollTop || document.documentElement.scrollTop) + "px";
            var s;
            s = t.srcElement ? t.srcElement : t.target, e.checkLanding(s, t)
        }
    }, dhtmlDragAndDropObject.prototype.calculateFramePosition = function(t) {
        if (window.name) {
            for (var e = parent.frames[window.name].frameElement.offsetParent, n = 0, i = 0; e;) n += e.offsetLeft, i += e.offsetTop, e = e.offsetParent;
            if (parent.dhtmlDragAndDrop) {
                var a = parent.dhtmlDragAndDrop.calculateFramePosition(1);
                n += 1 * a.split("_")[0], i += 1 * a.split("_")[1]
            }
            if (t) return n + "_" + i;
            this.fx = n, this.fy = i
        }
        return "0_0"
    }, dhtmlDragAndDropObject.prototype.checkLanding = function(t, e) {
        t && t.dragLanding ? (this.lastLanding && this.lastLanding.dragLanding._dragOut(this.lastLanding), this.lastLanding = t, this.lastLanding = this.lastLanding.dragLanding._dragIn(this.lastLanding, this.dragStartNode, e.clientX, e.clientY, e), this.lastLanding_scr = _isIE ? e.srcElement : e.target) : t && "BODY" != t.tagName ? this.checkLanding(t.parentNode, e) : (this.lastLanding && this.lastLanding.dragLanding._dragOut(this.lastLanding, e.clientX, e.clientY, e), this.lastLanding = 0, this._onNotFound && this._onNotFound())
    }, dhtmlDragAndDropObject.prototype.stopDrag = function(t, e) {
        var n = window.dhtmlDragAndDrop;
        if (!e) {
            n.stopFrameRoute();
            var i = n.lastLanding;
            n.lastLanding = null, i && i.dragLanding._drag(n.dragStartNode, n.dragStartObject, i, _isIE ? event.srcElement : t.target)
        }
        n.lastLanding = null, n.dragNode && n.dragNode.parentNode == document.body && n.dragNode.parentNode.removeChild(n.dragNode), n.dragNode = 0, n.gldragNode = 0, n.fx = 0, n.fy = 0, n.dragStartNode = 0, n.dragStartObject = 0, document.body.onmouseup = n.tempDOMU, document.body.onmousemove = n.tempDOMM, n.tempDOMU = null, n.tempDOMM = null, n.waitDrag = 0
    }, dhtmlDragAndDropObject.prototype.stopFrameRoute = function(t) {
        t && window.dhtmlDragAndDrop.stopDrag(1, 1);
        for (var e = 0; e < window.frames.length; e++) try {
            window.frames[e] != t && window.frames[e].dhtmlDragAndDrop && window.frames[e].dhtmlDragAndDrop.stopFrameRoute(window)
        } catch (n) {}
        try {
            parent.dhtmlDragAndDrop && parent != window && parent != t && parent.dhtmlDragAndDrop.stopFrameRoute(window)
        } catch (n) {}
    }, dhtmlDragAndDropObject.prototype.initFrameRoute = function(t, e) {
        t && (window.dhtmlDragAndDrop.preCreateDragCopy(), window.dhtmlDragAndDrop.dragStartNode = t.dhtmlDragAndDrop.dragStartNode, window.dhtmlDragAndDrop.dragStartObject = t.dhtmlDragAndDrop.dragStartObject, window.dhtmlDragAndDrop.dragNode = t.dhtmlDragAndDrop.dragNode, window.dhtmlDragAndDrop.gldragNode = t.dhtmlDragAndDrop.dragNode, window.document.body.onmouseup = window.dhtmlDragAndDrop.stopDrag, window.waitDrag = 0, !_isIE && e && (!_isFF || _FFrv < 1.8) && window.dhtmlDragAndDrop.calculateFramePosition());
        try {
            parent.dhtmlDragAndDrop && parent != window && parent != t && parent.dhtmlDragAndDrop.initFrameRoute(window)
        } catch (n) {}
        for (var i = 0; i < window.frames.length; i++) try {
            window.frames[i] != t && window.frames[i].dhtmlDragAndDrop && window.frames[i].dhtmlDragAndDrop.initFrameRoute(window, !t || e ? 1 : 0)
        } catch (n) {}
    }, _isFF = !1, _isIE = !1, _isOpera = !1, _isKHTML = !1, _isMacOS = !1, _isChrome = !1, _FFrv = !1, _KHTMLrv = !1, _OperaRv = !1, -1 != navigator.userAgent.indexOf("Macintosh") && (_isMacOS = !0), navigator.userAgent.toLowerCase().indexOf("chrome") > -1 && (_isChrome = !0), -1 != navigator.userAgent.indexOf("Safari") || -1 != navigator.userAgent.indexOf("Konqueror") ? (_KHTMLrv = parseFloat(navigator.userAgent.substr(navigator.userAgent.indexOf("Safari") + 7, 5)), _KHTMLrv > 525 ? (_isFF = !0, _FFrv = 1.9) : _isKHTML = !0) : -1 != navigator.userAgent.indexOf("Opera") ? (_isOpera = !0, _OperaRv = parseFloat(navigator.userAgent.substr(navigator.userAgent.indexOf("Opera") + 6, 3))) : -1 != navigator.appName.indexOf("Microsoft") ? (_isIE = !0, -1 == navigator.appVersion.indexOf("MSIE 8.0") && -1 == navigator.appVersion.indexOf("MSIE 9.0") && -1 == navigator.appVersion.indexOf("MSIE 10.0") || "BackCompat" == document.compatMode || (_isIE = 8)) : "Netscape" == navigator.appName && -1 != navigator.userAgent.indexOf("Trident") ? _isIE = 8 : (_isFF = !0, _FFrv = parseFloat(navigator.userAgent.split("rv:")[1])), dtmlXMLLoaderObject.prototype.doXPath = function(t, e, n, i) {
        if (_isKHTML || !_isIE && !window.XPathResult) return this.doXPathOpera(t, e);
        if (_isIE) return e || (e = this.xmlDoc.nodeName ? this.xmlDoc : this.xmlDoc.responseXML), e || dhtmlxError.throwError("LoadXML", "Incorrect XML", [e || this.xmlDoc, this.mainObject]), n && e.setProperty("SelectionNamespaces", "xmlns:xsl='" + n + "'"), "single" == i ? e.selectSingleNode(t) : e.selectNodes(t) || new Array(0);
        var a = e;
        e || (e = this.xmlDoc.nodeName ? this.xmlDoc : this.xmlDoc.responseXML), e || dhtmlxError.throwError("LoadXML", "Incorrect XML", [e || this.xmlDoc, this.mainObject]), -1 != e.nodeName.indexOf("document") ? a = e : (a = e, e = e.ownerDocument);
        var s = XPathResult.ANY_TYPE;
        "single" == i && (s = XPathResult.FIRST_ORDERED_NODE_TYPE);
        var r = [],
            o = e.evaluate(t, a, function() {
                return n
            }, s, null);
        if (s == XPathResult.FIRST_ORDERED_NODE_TYPE) return o.singleNodeValue;
        for (var d = o.iterateNext(); d;) r[r.length] = d, d = o.iterateNext();
        return r
    }, _dhtmlxError.prototype.catchError = function(t, e) {
        this.catches[t] = e
    }, _dhtmlxError.prototype.throwError = function(t, e, n) {
        return this.catches[t] ? this.catches[t](t, e, n) : this.catches.ALL ? this.catches.ALL(t, e, n) : (window.alert("Error type: " + arguments[0] + "\nDescription: " + arguments[1]), null)
    }, window.dhtmlxError = new _dhtmlxError, dtmlXMLLoaderObject.prototype.doXPathOpera = function(t, e) {
        var n = t.replace(/[\/]+/gi, "/").split("/"),
            i = null,
            a = 1;
        if (!n.length) return [];
        if ("." == n[0]) i = [e];
        else {
            if ("" !== n[0]) return [];
            i = (this.xmlDoc.responseXML || this.xmlDoc).getElementsByTagName(n[a].replace(/\[[^\]]*\]/g, "")), a++
        }
        for (a; a < n.length; a++) i = this._getAllNamedChilds(i, n[a]);
        return -1 != n[a - 1].indexOf("[") && (i = this._filterXPath(i, n[a - 1])), i
    }, dtmlXMLLoaderObject.prototype._filterXPath = function(t, e) {
        for (var n = [], e = e.replace(/[^\[]*\[\@/g, "").replace(/[\[\]\@]*/g, ""), i = 0; i < t.length; i++) t[i].getAttribute(e) && (n[n.length] = t[i]);
        return n
    }, dtmlXMLLoaderObject.prototype._getAllNamedChilds = function(t, e) {
        var n = [];
        _isKHTML && (e = e.toUpperCase());
        for (var i = 0; i < t.length; i++)
            for (var a = 0; a < t[i].childNodes.length; a++) _isKHTML ? t[i].childNodes[a].tagName && t[i].childNodes[a].tagName.toUpperCase() == e && (n[n.length] = t[i].childNodes[a]) : t[i].childNodes[a].tagName == e && (n[n.length] = t[i].childNodes[a]);
        return n
    }, "undefined" == typeof window.dhtmlxEvent && (window.dhtmlxEvent = function(t, e, n) {
        t.addEventListener ? t.addEventListener(e, n, !1) : t.attachEvent && t.attachEvent("on" + e, n)
    }), dtmlXMLLoaderObject.prototype.xslDoc = null, dtmlXMLLoaderObject.prototype.setXSLParamValue = function(t, e, n) {
        n || (n = this.xslDoc), n.responseXML && (n = n.responseXML);
        var i = this.doXPath("/xsl:stylesheet/xsl:variable[@name='" + t + "']", n, "http://www.w3.org/1999/XSL/Transform", "single");
        i && (i.firstChild.nodeValue = e)
    }, dtmlXMLLoaderObject.prototype.doXSLTransToObject = function(t, e) {
        t || (t = this.xslDoc), t.responseXML && (t = t.responseXML), e || (e = this.xmlDoc), e.responseXML && (e = e.responseXML);
        var n;
        if (_isIE) {
            n = new ActiveXObject("Msxml2.DOMDocument.3.0");
            try {
                e.transformNodeToObject(t, n)
            } catch (i) {
                n = e.transformNode(t)
            }
        } else this.XSLProcessor || (this.XSLProcessor = new XSLTProcessor, this.XSLProcessor.importStylesheet(t)), n = this.XSLProcessor.transformToDocument(e);
        return n
    }, dtmlXMLLoaderObject.prototype.doXSLTransToString = function(t, e) {
        var n = this.doXSLTransToObject(t, e);
        return "string" == typeof n ? n : this.doSerialization(n)
    }, dtmlXMLLoaderObject.prototype.doSerialization = function(t) {
        if (t || (t = this.xmlDoc), t.responseXML && (t = t.responseXML), _isIE) return t.xml;
        var e = new XMLSerializer;
        return e.serializeToString(t)
    }, dhtmlxEventable = function(obj) {
        obj.attachEvent = function(t, e, n) {
            return t = "ev_" + t.toLowerCase(), this[t] || (this[t] = new this.eventCatcher(n || this)), t + ":" + this[t].addEvent(e)
        }, obj.callEvent = function(t, e) {
            return t = "ev_" + t.toLowerCase(), this[t] ? this[t].apply(this, e) : !0
        }, obj.checkEvent = function(t) {
            return !!this["ev_" + t.toLowerCase()]
        }, obj.eventCatcher = function(obj) {
            var dhx_catch = [],
                z = function() {
                    for (var t = !0, e = 0; e < dhx_catch.length; e++)
                        if (dhx_catch[e]) {
                            var n = dhx_catch[e].apply(obj, arguments);
                            t = t && n
                        }
                    return t
                };
            return z.addEvent = function(ev) {
                return "function" != typeof ev && (ev = eval(ev)), ev ? dhx_catch.push(ev) - 1 : !1
            }, z.removeEvent = function(t) {
                dhx_catch[t] = null
            }, z
        }, obj.detachEvent = function(t) {
            if (t) {
                var e = t.split(":");
                this[e[0]].removeEvent(e[1])
            }
        }, obj.detachAllEvents = function() {
            for (var t in this) 0 === t.indexOf("ev_") && (this.detachEvent(t), this[t] = null)
        }, obj = null
    }, window.dhtmlx || (window.dhtmlx = {}),
    function() {
        function t(t, e) {
            var i = t.callback;
            n(!1), t.box.parentNode.removeChild(t.box), g = t.box = null, i && i(e)
        }

        function e(e) {
            if (g) {
                e = e || event;
                var n = e.which || event.keyCode;
                return dhtmlx.message.keyboard && ((13 == n || 32 == n) && t(g, !0), 27 == n && t(g, !1)), e.preventDefault && e.preventDefault(), !(e.cancelBubble = !0)
            }
        }

        function n(t) {
            n.cover || (n.cover = document.createElement("DIV"), n.cover.onkeydown = e, n.cover.className = "dhx_modal_cover", document.body.appendChild(n.cover));
            document.body.scrollHeight;
            n.cover.style.display = t ? "inline-block" : "none"
        }

        function i(t, e) {
            var n = "dhtmlx_" + t.toLowerCase().replace(/ /g, "_") + "_button";
            return "<div class='dhtmlx_popup_button " + n + "' result='" + e + "' ><div>" + t + "</div></div>"
        }

        function a(t) {
            c.area || (c.area = document.createElement("DIV"), c.area.className = "dhtmlx_message_area", c.area.style[c.position] = "5px", document.body.appendChild(c.area)), c.hide(t.id);
            var e = document.createElement("DIV");
            return e.innerHTML = "<div>" + t.text + "</div>", e.className = "dhtmlx-info dhtmlx-" + t.type, e.onclick = function() {
                c.hide(t.id), t = null
            }, "bottom" == c.position && c.area.firstChild ? c.area.insertBefore(e, c.area.firstChild) : c.area.appendChild(e), t.expire > 0 && (c.timers[t.id] = window.setTimeout(function() {
                c.hide(t.id)
            }, t.expire)), c.pull[t.id] = e, e = null, t.id
        }

        function s(e, n, a) {
            var s = document.createElement("DIV");
            s.className = " dhtmlx_modal_box dhtmlx-" + e.type, s.setAttribute("dhxbox", 1);
            var r = "";
            if (e.width && (s.style.width = e.width), e.height && (s.style.height = e.height), e.title && (r += '<div class="dhtmlx_popup_title">' + e.title + "</div>"), r += '<div class="dhtmlx_popup_text"><span>' + (e.content ? "" : e.text) + '</span></div><div  class="dhtmlx_popup_controls">', n && (r += i(e.ok || "OK", !0)), a && (r += i(e.cancel || "Cancel", !1)), e.buttons)
                for (var o = 0; o < e.buttons.length; o++) r += i(e.buttons[o], o);
            if (r += "</div>", s.innerHTML = r, e.content) {
                var d = e.content;
                "string" == typeof d && (d = document.getElementById(d)), "none" == d.style.display && (d.style.display = ""), s.childNodes[e.title ? 1 : 0].appendChild(d)
            }
            return s.onclick = function(n) {
                n = n || event;
                var i = n.target || n.srcElement;
                if (i.className || (i = i.parentNode), "dhtmlx_popup_button" == i.className.split(" ")[0]) {
                    var a = i.getAttribute("result");
                    a = "true" == a || ("false" == a ? !1 : a), t(e, a)
                }
            }, e.box = s, (n || a) && (g = e), s
        }

        function r(t, i, a) {
            var r = t.tagName ? t : s(t, i, a);
            t.hidden || n(!0), document.body.appendChild(r);
            var o = Math.abs(Math.floor(((window.innerWidth || document.documentElement.offsetWidth) - r.offsetWidth) / 2)),
                d = Math.abs(Math.floor(((window.innerHeight || document.documentElement.offsetHeight) - r.offsetHeight) / 2));
            return r.style.top = "top" == t.position ? "-3px" : d + "px", r.style.left = o + "px", r.onkeydown = e, r.focus(), t.hidden && dhtmlx.modalbox.hide(r), r
        }

        function o(t) {
            return r(t, !0, !1)
        }

        function d(t) {
            return r(t, !0, !0)
        }

        function l(t) {
            return r(t)
        }

        function _(t, e, n) {
            return "object" != typeof t && ("function" == typeof e && (n = e, e = ""), t = {
                text: t,
                type: e,
                callback: n
            }), t
        }

        function h(t, e, n, i) {
            return "object" != typeof t && (t = {
                text: t,
                type: e,
                expire: n,
                id: i
            }), t.id = t.id || c.uid(), t.expire = t.expire || c.expire, t
        }
        var g = null;
        document.attachEvent ? document.attachEvent("onkeydown", e) : document.addEventListener("keydown", e, !0), dhtmlx.alert = function() {
            var t = _.apply(this, arguments);
            return t.type = t.type || "confirm", o(t)
        }, dhtmlx.confirm = function() {
            var t = _.apply(this, arguments);
            return t.type = t.type || "alert", d(t)
        }, dhtmlx.modalbox = function() {
            var t = _.apply(this, arguments);
            return t.type = t.type || "alert", l(t)
        }, dhtmlx.modalbox.hide = function(t) {
            for (; t && t.getAttribute && !t.getAttribute("dhxbox");) t = t.parentNode;
            t && (t.parentNode.removeChild(t), n(!1))
        };
        var c = dhtmlx.message = function(t) {
            t = h.apply(this, arguments), t.type = t.type || "info";
            var e = t.type.split("-")[0];
            switch (e) {
                case "alert":
                    return o(t);
                case "confirm":
                    return d(t);
                case "modalbox":
                    return l(t);
                default:
                    return a(t)
            }
        };
        c.seed = (new Date).valueOf(), c.uid = function() {
            return c.seed++
        }, c.expire = 4e3, c.keyboard = !0, c.position = "top", c.pull = {}, c.timers = {}, c.hideAll = function() {
            for (var t in c.pull) c.hide(t)
        }, c.hide = function(t) {
            var e = c.pull[t];
            e && e.parentNode && (window.setTimeout(function() {
                e.parentNode.removeChild(e), e = null
            }, 2e3), e.className += " hidden", c.timers[t] && window.clearTimeout(c.timers[t]), delete c.pull[t])
        }
    }(), gantt = {
        version: "3.1.1"
    }, dhtmlxEventable = function(obj) {
        obj._silent_mode = !1, obj._silentStart = function() {
            this._silent_mode = !0
        }, obj._silentEnd = function() {
            this._silent_mode = !1
        }, obj.attachEvent = function(t, e, n) {
            return t = "ev_" + t.toLowerCase(), this[t] || (this[t] = new this._eventCatcher(n || this)), t + ":" + this[t].addEvent(e)
        }, obj.callEvent = function(t, e) {
            return this._silent_mode ? !0 : (t = "ev_" + t.toLowerCase(), this[t] ? this[t].apply(this, e) : !0)
        }, obj.checkEvent = function(t) {
            return !!this["ev_" + t.toLowerCase()]
        }, obj._eventCatcher = function(obj) {
            var dhx_catch = [],
                z = function() {
                    for (var t = !0, e = 0; e < dhx_catch.length; e++)
                        if (dhx_catch[e]) {
                            var n = dhx_catch[e].apply(obj, arguments);
                            t = t && n
                        }
                    return t
                };
            return z.addEvent = function(ev) {
                return "function" != typeof ev && (ev = eval(ev)), ev ? dhx_catch.push(ev) - 1 : !1
            }, z.removeEvent = function(t) {
                dhx_catch[t] = null
            }, z
        }, obj.detachEvent = function(t) {
            if (t) {
                var e = t.split(":");
                this[e[0]].removeEvent(e[1])
            }
        }, obj.detachAllEvents = function() {
            for (var t in this) 0 === t.indexOf("ev_") && delete this[t]
        }, obj = null
    }, dhtmlx.copy = function(t) {
        var e, n, i;
        if (t && "object" == typeof t) {
            for (i = {}, n = [Array, Date, Number, String, Boolean], e = 0; e < n.length; e++) t instanceof n[e] && (i = e ? new n[e](t) : new n[e]);
            for (e in t) Object.prototype.hasOwnProperty.apply(t, [e]) && (i[e] = dhtmlx.copy(t[e]))
        }
        return i || t
    }, dhtmlx.mixin = function(t, e, n) {
        for (var i in e)(!t[i] || n) && (t[i] = e[i]);
        return t
    }, dhtmlx.defined = function(t) {
        return "undefined" != typeof t
    }, dhtmlx.uid = function() {
        return this._seed || (this._seed = (new Date).valueOf()), this._seed++, this._seed
    }, dhtmlx.bind = function(t, e) {
        return function() {
            return t.apply(e, arguments)
        }
    }, gantt._get_position = function(t) {
        var e = 0,
            n = 0;
        if (t.getBoundingClientRect) {
            var i = t.getBoundingClientRect(),
                a = document.body,
                s = document.documentElement,
                r = window.pageYOffset || s.scrollTop || a.scrollTop,
                o = window.pageXOffset || s.scrollLeft || a.scrollLeft,
                d = s.clientTop || a.clientTop || 0,
                l = s.clientLeft || a.clientLeft || 0;
            return e = i.top + r - d, n = i.left + o - l, {
                y: Math.round(e),
                x: Math.round(n),
                width: t.offsetWidth,
                height: t.offsetHeight
            }
        }
        for (; t;) e += parseInt(t.offsetTop, 10), n += parseInt(t.offsetLeft, 10), t = t.offsetParent;
        return {
            y: e,
            x: n,
            width: t.offsetWidth,
            height: t.offsetHeight
        }
    }, gantt._detectScrollSize = function() {
        var t = document.createElement("div");
        t.style.cssText = "visibility:hidden;position:absolute;left:-1000px;width:100px;padding:0px;margin:0px;height:110px;min-height:100px;overflow-y:scroll;", document.body.appendChild(t);
        var e = t.offsetWidth - t.clientWidth;
        return document.body.removeChild(t), e
    }, dhtmlxEventable(gantt), gantt._click = {}, gantt._dbl_click = {}, gantt._context_menu = {}, gantt._on_click = function(t) {
        t = t || window.event;
        var e = t.target || t.srcElement,
            n = gantt.locate(t),
            i = !0;
        if (null !== n ? i = !gantt.checkEvent("onTaskClick") || gantt.callEvent("onTaskClick", [n, t]) : gantt.callEvent("onEmptyClick", [t]), i) {
            var a = gantt._find_ev_handler(t, e, gantt._click, n);
            if (!a) return;
            n && gantt.getTask(n) && gantt.config.select_task && gantt.selectTask(n)
        }
    }, gantt._on_contextmenu = function(t) {
        t = t || window.event;
        var e = t.target || t.srcElement,
            n = gantt.locate(e),
            i = gantt.locate(e, gantt.config.link_attribute),
            a = !gantt.checkEvent("onContextMenu") || gantt.callEvent("onContextMenu", [n, i, t]);
        return a || (t.preventDefault ? t.preventDefault() : t.returnValue = !1), a
    }, gantt._find_ev_handler = function(t, e, n, i) {
        for (var a = !0; e;) {
            var s = e.className || "";
            if (s) {
                s = s.split(" ");
                for (var r = 0; r < s.length; r++)
                    if (s[r] && n[s[r]]) {
                        var o = n[s[r]].call(gantt, t, i, e);
                        a = a && !("undefined" != typeof o && o !== !0)
                    }
            }
            e = e.parentNode
        }
        return a
    }, gantt._on_dblclick = function(t) {
        t = t || window.event;
        var e = t.target || t.srcElement,
            n = gantt.locate(t),
            i = !gantt.checkEvent("onTaskDblClick") || gantt.callEvent("onTaskDblClick", [n, t]);
        if (i) {
            var a = gantt._find_ev_handler(t, e, gantt._dbl_click, n);
            if (!a) return;
            null !== n && gantt.getTask(n) && i && gantt.config.details_on_dblclick && gantt.showLightbox(n)
        }
    }, gantt._on_mousemove = function(t) {
        if (gantt.checkEvent("onMouseMove")) {
            var e = gantt.locate(t);
            gantt._last_move_event = t, gantt.callEvent("onMouseMove", [e, t])
        }
    }, dhtmlxDnD.prototype = {
        dragStart: function(t, e) {
            this.config = {
                obj: t,
                marker: null,
                started: !1,
                pos: this.getPosition(e),
                sensitivity: 4
            }, this._settings && dhtmlx.mixin(this.config, this._settings, !0);
            var n = dhtmlx.bind(function(e) {
                    return this.dragMove(t, e)
                }, this),
                i = (dhtmlx.bind(function(e) {
                    return this.dragScroll(t, e)
                }, this), dhtmlx.bind(function(t) {
                    return dhtmlx.defined(this.config.updates_per_second) && !gantt._checkTimeout(this, this.config.updates_per_second) ? !0 : n(t)
                }, this)),
                a = dhtmlx.bind(function() {
                    return dhtmlxDetachEvent(document.body, "mousemove", i), dhtmlxDetachEvent(document.body, "mouseup", a), this.dragEnd(t)
                }, this);
            dhtmlxEvent(document.body, "mousemove", i), dhtmlxEvent(document.body, "mouseup", a), document.body.className += " gantt_noselect"
        },
        dragMove: function(t, e) {
            if (!this.config.marker && !this.config.started) {
                var n = this.getPosition(e),
                    i = n.x - this.config.pos.x,
                    a = n.y - this.config.pos.y,
                    s = Math.sqrt(Math.pow(Math.abs(i), 2) + Math.pow(Math.abs(a), 2));
                if (s > this.config.sensitivity) {
                    if (this.config.started = !0, this.config.ignore = !1, this.callEvent("onBeforeDragStart", [t, this.config.original_target]) === !1) return this.config.ignore = !0, !0;
                    var r = this.config.marker = document.createElement("div");
                    r.className = "gantt_drag_marker", r.innerHTML = "Dragging object", document.body.appendChild(r), this.callEvent("onAfterDragStart", [t, this.config.original_target])
                } else this.config.ignore = !0
            }
            this.config.ignore || (e.pos = this.getPosition(e), this.config.marker.style.left = e.pos.x + "px", this.config.marker.style.top = e.pos.y + "px", this.callEvent("onDragMove", [t, e]))
        },
        dragEnd: function() {
            this.config.marker && (this.config.marker.parentNode.removeChild(this.config.marker), this.config.marker = null, this.callEvent("onDragEnd", [])), document.body.className = document.body.className.replace(" gantt_noselect", "")
        },
        getPosition: function(t) {
            var e = 0,
                n = 0;
            return t = t || window.event, t.pageX || t.pageY ? (e = t.pageX, n = t.pageY) : (t.clientX || t.clientY) && (e = t.clientX + document.body.scrollLeft + document.documentElement.scrollLeft, n = t.clientY + document.body.scrollTop + document.documentElement.scrollTop), {
                x: e,
                y: n
            }
        }
    }, gantt._init_grid = function() {
        this._click.gantt_close = dhtmlx.bind(function(t, e) {
            return this.close(e), !1
        }, this), this._click.gantt_open = dhtmlx.bind(function(t, e) {
            return this.open(e), !1
        }, this), this._click.gantt_row = dhtmlx.bind(function(t, e, n) {
            if (null !== e) {
                var i = this.getTask(e);
                this.showDate(i.start_date), this.callEvent("onTaskRowClick", [e, n])
            }
        }, this), this._click.gantt_grid_head_cell = dhtmlx.bind(function(t, e, n) {
            var i = n.getAttribute("column_id");
            if (this.callEvent("onGridHeaderClick", [i, t]))
                if ("add" == i) this._click.gantt_add(t, this.config.root_id);
                else if (this.config.sort) {
                var a = this._sort && this._sort.direction && this._sort.name == i ? this._sort.direction : "desc";
                a = "desc" == a ? "asc" : "desc", this._sort = {
                    name: i,
                    direction: a
                }, this._render_grid_header(), this.sort(i, "desc" == a)
            }
        }, this), !this.config.sort && this.config.order_branch && this._init_dnd(), this._click.gantt_add = dhtmlx.bind(function(t, e) {
            if (!this.config.readonly) {
                var n = {};
                return this.createTask(n, e ? e : this.config.root_id), !1
            }
        }, this), this._init_resize && this._init_resize()
    }, gantt._render_grid = function() {
        this._is_grid_visible() && (this._calc_grid_width(), this._render_grid_header())
    }, gantt._calc_grid_width = function() {
        if (this.config.autofit) {
            for (var t = this.getGridColumns(), e = 0, n = [], i = [], a = 0; a < t.length; a++) {
                var s = parseInt(t[a].width, 10);
                window.isNaN(s) && (s = 50, n.push(a)), i[a] = s, e += s
            } {
                var r = this._get_grid_width() - e;
                r / (n.length > 0 ? n.length : i.length > 0 ? i.length : 1)
            }
            if (n.length > 0)
                for (var o = r / (n.length ? n.length : 1), a = 0; a < n.length; a++) {
                    var d = n[a];
                    i[d] += o
                } else
                    for (var o = r / (i.length ? i.length : 1), a = 0; a < i.length; a++) i[a] += o;
            for (var a = 0; a < i.length; a++) t[a].width = i[a]
        }
    }, gantt._render_grid_header = function() {
        for (var t = this.getGridColumns(), e = [], n = 0, i = this.locale.labels, a = this.config.scale_height - 2, s = 0; s < t.length; s++) {
            var r = s == t.length - 1,
                o = t[s];
            r && this._get_grid_width() > n + o.width && (o.width = this._get_grid_width() - n), n += o.width;
            var d = this._sort && o.name == this._sort.name ? "<div class='gantt_sort gantt_" + this._sort.direction + "'></div>" : "",
                l = ["gantt_grid_head_cell", "gantt_grid_head_" + o.name, r ? "gantt_last_cell" : "", this.templates.grid_header_class(o.name, o)].join(" "),
                _ = "width:" + (o.width - (r ? 1 : 0)) + "px;",
                h = o.label || i["column_" + o.name];
            h = h || "";
            var g = "<div class='" + l + "' style='" + _ + "' column_id='" + o.name + "'>" + h + d + "</div>";
            e.push(g)
        }
        this.$grid_scale.style.height = this.config.scale_height - 1 + "px", this.$grid_scale.style.lineHeight = a + "px", this.$grid_scale.style.width = n - 1 + "px", this.$grid_scale.innerHTML = e.join(""), this._render_grid_header_resize && this._render_grid_header_resize()
    }, gantt._render_grid_item = function(t) {
        if (!gantt._is_grid_visible()) return null;
        for (var e = this.getGridColumns(), n = [], i = 0; i < e.length; i++) {
            var a, s, r = i == e.length - 1,
                o = e[i];
            "add" == o.name ? s = "<div class='gantt_add'></div>" : (s = o.template ? o.template(t) : t[o.name], s instanceof Date && (s = this.templates.date_grid(s)), s = "<div class='gantt_tree_content'>" + s + "</div>");
            var d = "gantt_cell" + (r ? " gantt_last_cell" : ""),
                l = "";
            if (o.tree) {
                for (var _ = 0; _ < t.$level; _++) l += this.templates.grid_indent(t);
                var h = this._has_children(t.id);
                h ? (l += this.templates.grid_open(t), l += this.templates.grid_folder(t)) : (l += this.templates.grid_blank(t), l += this.templates.grid_file(t))
            }
            var g = "width:" + (o.width - (r ? 1 : 0)) + "px;";
            dhtmlx.defined(o.align) && (g += "text-align:" + o.align + ";"), a = "<div class='" + d + "' style='" + g + "'>" + l + s + "</div>", n.push(a)
        }
        var d = t.$index % 2 === 0 ? "" : " odd";
        if (d += t.$transparent ? " gantt_transparent" : "", this.templates.grid_row_class) {
            var c = this.templates.grid_row_class.call(this, t.start_date, t.end_date, t);
            c && (d += " " + c)
        }
        this.getState().selected_task == t.id && (d += " gantt_selected");
        var u = document.createElement("div");
        return u.className = "gantt_row" + d, u.style.height = this.config.row_height + "px", u.style.lineHeight = gantt.config.row_height + "px", u.setAttribute(this.config.task_attribute, t.id), u.innerHTML = n.join(""), u
    }, gantt.open = function(t) {
        gantt._set_item_state(t, !0), this.callEvent("onTaskOpened", [t])
    }, gantt.close = function(t) {
        gantt._set_item_state(t, !1), this.callEvent("onTaskClosed", [t])
    }, gantt._set_item_state = function(t, e) {
        t && this._pull[t] && (this._pull[t].$open = e, this.refreshData())
    }, gantt._is_grid_visible = function() {
        return this.config.grid_width && this.config.show_grid
    }, gantt._get_grid_width = function() {
        return this._is_grid_visible() ? this._is_chart_visible() ? this.config.grid_width : this._x : 0
    }, gantt.getTaskIndex = function(t) {
        for (var e = this._branches[this.getTask(t).parent], n = 0; n < e.length; n++)
            if (e[n] == t) return n;
        return -1
    }, gantt.getGlobalTaskIndex = function(t) {
        for (var e = this._order, n = 0; n < e.length; n++)
            if (e[n] == t) return n;
        return -1
    }, gantt.moveTask = function(t, e, n) {
        var i = arguments[3];
        if (i) {
            if (i === t) return;
            n = this.getTask(i).parent, e = this.getTaskIndex(i)
        }
        if (t != n) {
            n = n || this.config.root_id;
            var a = this.getTask(t),
                s = (this._branches[a.parent], this._branches[n] || []);
            if (-1 == e && (e = s.length + 1), a.parent == n) {
                var r = this.getTaskIndex(t);
                if (r == e) return
            }
            this._replace_branch_child(a.parent, t), s = this._branches[n] || [];
            var o = s[e];
            o ? s = s.slice(0, e).concat([t]).concat(s.slice(e)) : s.push(t), a.parent = n, this._branches[n] = s;
            for (var d = this._getTaskTree(t), l = 0; l < d.length; l++) {
                var _ = this._pull[d[l]];
                _ && (_.$level = this.calculateTaskLevel(_))
            }
            a.$drop_target = 1 * e > 0 ? i ? (this.getTaskIndex(t) > this.getTaskIndex(i) ? "next:" : "") + i : "next:" + gantt.getPrevSibling(t) : s[1 * e + 1] ? s[1 * e + 1] : n, this.refreshData()
        }
    }, gantt._init_dnd = function() {
        var t = new dhtmlxDnD(this.$grid_data, {
            updates_per_second: 60
        });
        dhtmlx.defined(this.config.dnd_sensitivity) && (t.config.sensitivity = this.config.dnd_sensitivity), t.attachEvent("onBeforeDragStart", dhtmlx.bind(function(e, n) {
            var i = this._locateHTML(n);
            if (!i) return !1;
            this.hideQuickInfo && this._hideQuickInfo();
            var a = this.locate(n),
                s = gantt.getTask(a);
            return gantt._is_readonly(s) ? !1 : (t.config.initial_open_state = s.$open, this.callEvent("onRowDragStart", [a, n.target || n.srcElement, n]) ? void 0 : !1)
        }, this)), t.attachEvent("onAfterDragStart", dhtmlx.bind(function(e, n) {
            var i = this._locateHTML(n);
            t.config.marker.innerHTML = i.outerHTML, t.config.id = this.locate(n);
            var a = this.getTask(t.config.id);
            a.$open = !1, a.$transparent = !0, this.refreshData()
        }, this)), t.lastTaskOfLevel = function(t) {
            for (var e = gantt._order, n = gantt._pull, i = null, a = 0, s = e.length; s > a; a++) n[e[a]].$level == t && (i = n[e[a]]);
            return i ? i.id : null
        }, t._getGridPos = dhtmlx.bind(function(t) {
            var e = this._get_position(this.$grid_data),
                n = e.x,
                i = t.pos.y - 10;
            return i < e.y && (i = e.y), i > e.y + this.$grid_data.offsetHeight - this.config.row_height && (i = e.y + this.$grid_data.offsetHeight - this.config.row_height), e.x = n, e.y = i, e
        }, this), t.attachEvent("onDragMove", dhtmlx.bind(function(e, n) {
            var i = t.config,
                a = t._getGridPos(n);
            i.marker.style.left = a.x + 10 + "px", i.marker.style.top = a.y + "px", a = t._getGridPos(n);
            var s = (a.x, a.y),
                r = document.elementFromPoint(a.x - document.body.scrollLeft + 1, s - document.body.scrollTop),
                o = this.locate(r),
                d = this.getTask(t.config.id);
            if (this.isTaskExists(o) || (o = t.lastTaskOfLevel(d.$level), o == t.config.id && (o = null)), this.isTaskExists(o)) {
                var l = gantt._get_position(r),
                    _ = this.getTask(o);
                if (l.y + r.offsetHeight / 2 < s) {
                    var h = this.getGlobalTaskIndex(_.id),
                        g = this._pull[this._order[h + 1]];
                    if (g) {
                        if (g.id == d.id) return;
                        _ = g
                    } else if (g = this._pull[this._order[h]], g.$level == d.$level && g.id != d.id) return void this.moveTask(d.id, -1, g.parent)
                }
                for (var h = this.getGlobalTaskIndex(_.id), c = this._pull[this._order[h - 1]], u = 1;
                    (!c || c.id == _.id) && h - u >= 0;) c = this._pull[this._order[h - u]], u++;
                if (d.id == _.id) return;
                _.$level == d.$level && d.id != _.id ? this.moveTask(d.id, 0, 0, _.id) : _.$level != d.$level - 1 || gantt.getChildren(_.id).length ? c && c.$level == d.$level && d.id != c.id && this.moveTask(d.id, -1, c.parent) : this.moveTask(d.id, 0, _.id)
            }
            return !0
        }, this)), t.attachEvent("onDragEnd", dhtmlx.bind(function() {
            var e = this.getTask(t.config.id);
            e.$transparent = !1, e.$open = t.config.initial_open_state, this.callEvent("onRowDragEnd", [t.config.id, e.$drop_target]), this.refreshData()
        }, this))
    }, gantt.getGridColumns = function() {
        return this.config.columns
    }, gantt._has_children = function(t) {
        return this.getChildren(t).length > 0
    }, gantt._scale_helpers = {
        getSum: function(t, e, n) {
            void 0 === n && (n = t.length - 1), void 0 === e && (e = 0);
            for (var i = 0, a = e; n >= a; a++) i += t[a];
            return i
        },
        setSumWidth: function(t, e, n, i) {
            var a = e.width;
            void 0 === i && (i = a.length - 1), void 0 === n && (n = 0);
            var s = i - n + 1;
            if (!(n > a.length - 1 || 0 >= s || i > a.length - 1)) {
                var r = this.getSum(a, n, i),
                    o = t - r;
                this.adjustSize(o, a, n, i), this.adjustSize(-o, a, i + 1), e.full_width = this.getSum(a)
            }
        },
        splitSize: function(t, e) {
            for (var n = [], i = 0; e > i; i++) n[i] = 0;
            return this.adjustSize(t, n), n
        },
        adjustSize: function(t, e, n, i) {
            n || (n = 0), void 0 === i && (i = e.length - 1);
            for (var a = i - n + 1, s = this.getSum(e, n, i), r = 0, o = n; i >= o; o++) {
                var d = Math.floor(t * (s ? e[o] / s : 1 / a));
                s -= e[o], t -= d, a--, e[o] += d, r += d
            }
            e[e.length - 1] += t
        },
        sortScales: function(t) {
            function e(t, e) {
                var n = new Date(1970, 0, 1);
                return gantt.date.add(n, e, t) - n
            }
            t.sort(function(t, n) {
                return e(t.unit, t.step) < e(n.unit, n.step) ? 1 : e(t.unit, t.step) > e(n.unit, n.step) ? -1 : 0
            })
        },
        primaryScale: function() {
            return gantt._init_template("date_scale"), {
                unit: gantt.config.scale_unit,
                step: gantt.config.step,
                template: gantt.templates.date_scale,
                date: gantt.config.date_scale,
                css: gantt.templates.scale_cell_class
            }
        },
        prepareConfigs: function(t, e, n, i) {
            for (var a = this.splitSize(i, t.length), s = n, r = [], o = t.length - 1; o >= 0; o--) {
                var d = o == t.length - 1,
                    l = this.initScaleConfig(t[o]);
                d && this.processIgnores(l), this.initColSizes(l, e, s, a[o]), this.limitVisibleRange(l), d && (s = l.full_width), r.unshift(l)
            }
            for (var o = 0; o < r.length - 1; o++) this.alineScaleColumns(r[r.length - 1], r[o]);
            return r
        },
        _ignore_time_config: function(t) {
            return this.config.skip_off_time ? !this.isWorkTime(t) : !1
        },
        processIgnores: function(t) {
            t.ignore_x = {}, t.display_count = t.count
        },
        initColSizes: function(t, e, n, i) {
            var a = n;
            t.height = i;
            var s = void 0 === t.display_count ? t.count : t.display_count;
            s || (s = 1), t.col_width = Math.floor(a / s), e && t.col_width < e && (t.col_width = e, a = t.col_width * s), t.width = [];
            for (var r = t.ignore_x || {}, o = 0; o < t.trace_x.length; o++) t.width[o] = r[t.trace_x[o].valueOf()] || t.display_count == t.count ? 0 : 1;
            this.adjustSize(a - this.getSum(t.width), t.width), t.full_width = this.getSum(t.width)
        },
        initScaleConfig: function(t) {
            var e = dhtmlx.mixin({
                count: 0,
                col_width: 0,
                full_width: 0,
                height: 0,
                width: [],
                trace_x: []
            }, t);
            return this.eachColumn(t.unit, t.step, function(t) {
                e.count++, e.trace_x.push(new Date(t))
            }), e
        },
        iterateScales: function(t, e, n, i, a) {
            for (var s = e.trace_x, r = t.trace_x, o = n || 0, d = i || r.length - 1, l = 0, _ = 1; _ < s.length; _++)
                for (var h = o; d >= h; h++) + r[h] != +s[_] || (a && a.apply(this, [l, _, o, h]), o = h, l = _)
        },
        alineScaleColumns: function(t, e, n, i) {
            this.iterateScales(t, e, n, i, function(n, i, a, s) {
                var r = this.getSum(t.width, a, s - 1),
                    o = this.getSum(e.width, n, i - 1);
                o != r && this.setSumWidth(r, e, n, i - 1)
            })
        },
        eachColumn: function(t, e, n) {
            var i = new Date(gantt._min_date),
                a = new Date(gantt._max_date);
            gantt.date[t + "_start"] && (i = gantt.date[t + "_start"](i));
            var s = new Date(i);
            for (+s >= +a && (a = gantt.date.add(s, e, t)); + a > +s;) n.call(this, new Date(s)), s = gantt.date.add(s, e, t)
        },
        limitVisibleRange: function(t) {
            var e = t.trace_x,
                n = 0,
                i = t.width.length - 1,
                a = 0;
            if (+e[0] < +gantt._min_date && n != i) {
                var s = Math.floor(t.width[0] * ((e[1] - gantt._min_date) / (e[1] - e[0])));
                a += t.width[0] - s, t.width[0] = s, e[0] = new Date(gantt._min_date)
            }
            var r = e.length - 1,
                o = e[r],
                d = gantt.date.add(o, t.step, t.unit);
            if (+d > +gantt._max_date && r > 0) {
                var s = t.width[r] - Math.floor(t.width[r] * ((d - gantt._max_date) / (d - o)));
                a += t.width[r] - s, t.width[r] = s
            }
            if (a) {
                for (var l = this.getSum(t.width), _ = 0, h = 0; h < t.width.length; h++) {
                    var g = Math.floor(a * (t.width[h] / l));
                    t.width[h] += g, _ += g
                }
                this.adjustSize(a - _, t.width)
            }
        }
    }, gantt._tasks_dnd = {
        drag: null,
        _events: {
            before_start: {},
            before_finish: {},
            after_finish: {}
        },
        _handlers: {},
        init: function() {
            this.clear_drag_state();
            var t = gantt.config.drag_mode;
            this.set_actions();
            var e = {
                before_start: "onBeforeTaskDrag",
                before_finish: "onBeforeTaskChanged",
                after_finish: "onAfterTaskDrag"
            };
            for (var n in this._events)
                for (var i in t) this._events[n][i] = e[n];
            this._handlers[t.move] = this._move, this._handlers[t.resize] = this._resize, this._handlers[t.progress] = this._resize_progress
        },
        set_actions: function() {
            var t = gantt.$task_data;
            dhtmlxEvent(t, "mousemove", dhtmlx.bind(function(t) {
                this.on_mouse_move(t || event)
            }, this)), dhtmlxEvent(t, "mousedown", dhtmlx.bind(function(t) {
                this.on_mouse_down(t || event)
            }, this)), dhtmlxEvent(t, "mouseup", dhtmlx.bind(function(t) {
                this.on_mouse_up(t || event)
            }, this))
        },
        clear_drag_state: function() {
            this.drag = {
                id: null,
                mode: null,
                pos: null,
                start_x: null,
                start_y: null,
                obj: null,
                left: null
            }
        },
        _resize: function(t, e, n) {
            var i = gantt.config,
                a = this._drag_task_coords(t, n);
            n.left ? (t.start_date = gantt._date_from_pos(a.start + e), t.start_date || (t.start_date = new Date(gantt.getState().min_date))) : (t.end_date = gantt._date_from_pos(a.end + e), t.end_date || (t.end_date = new Date(gantt.getState().max_date))), t.end_date - t.start_date < i.min_duration && (n.left ? t.start_date = gantt.calculateEndDate(t.end_date, -1) : t.end_date = gantt.calculateEndDate(t.start_date, 1)), gantt._init_task_timing(t)
        },
        _resize_progress: function(t, e, n) {
            var i = this._drag_task_coords(t, n),
                a = Math.max(0, n.pos.x - i.start);
            t.progress = Math.min(1, a / (i.end - i.start))
        },
        _move: function(t, e, n) {
            var i = this._drag_task_coords(t, n),
                a = gantt._date_from_pos(i.start + e),
                s = gantt._date_from_pos(i.end + e);
            a ? s ? (t.start_date = a, t.end_date = s) : (t.end_date = new Date(gantt.getState().max_date), t.start_date = gantt._date_from_pos(gantt.posFromDate(t.end_date) - (i.end - i.start))) : (t.start_date = new Date(gantt.getState().min_date), t.end_date = gantt._date_from_pos(gantt.posFromDate(t.start_date) + (i.end - i.start)))
        },
        _drag_task_coords: function(t, e) {
            var n = e.obj_s_x = e.obj_s_x || gantt.posFromDate(t.start_date),
                i = e.obj_e_x = e.obj_e_x || gantt.posFromDate(t.end_date);
            return {
                start: n,
                end: i
            }
        },
        on_mouse_move: function(t) {
            this.drag.start_drag && this._start_dnd(t);
            var e = this.drag;
            if (e.mode) {
                if (!gantt._checkTimeout(this, 40)) return;
                this._update_on_move(t)
            }
        },
        _update_on_move: function(t) {
            var e = this.drag;
            if (e.mode) {
                var n = gantt._get_mouse_pos(t);
                if (e.pos && e.pos.x == n.x) return;
                e.pos = n;
                var i = gantt._date_from_pos(n.x);
                if (!i || isNaN(i.getTime())) return;
                var a = n.x - e.start_x,
                    s = gantt.getTask(e.id);
                if (this._handlers[e.mode]) {
                    var r = dhtmlx.mixin({}, s),
                        o = dhtmlx.mixin({}, s);
                    this._handlers[e.mode].apply(this, [o, a, e]), dhtmlx.mixin(s, o, !0), gantt._update_parents(e.id, !0), gantt.callEvent("onTaskDrag", [s.id, e.mode, o, r, t]), dhtmlx.mixin(s, o, !0), gantt._update_parents(e.id), gantt.refreshTask(e.id)
                }
            }
        },
        on_mouse_down: function(t, e) {
            if (2 != t.button) {
                var n = gantt.locate(t),
                    i = null;
                if (gantt.isTaskExists(n) && (i = gantt.getTask(n)), !gantt._is_readonly(i) && !this.drag.mode) {
                    this.clear_drag_state(), e = e || t.target || t.srcElement;
                    var a = gantt._trim(e.className || "");
                    if (!a || !this._get_drag_mode(a)) return e.parentNode ? this.on_mouse_down(t, e.parentNode) : void 0;
                    var s = this._get_drag_mode(a);
                    if (s)
                        if (s.mode && s.mode != gantt.config.drag_mode.ignore && gantt.config["drag_" + s.mode]) {
                            if (n = gantt.locate(e), i = dhtmlx.copy(gantt.getTask(n) || {}), gantt._is_readonly(i)) return this.clear_drag_state(), !1;
                            if (gantt._is_flex_task(i) && s.mode != gantt.config.drag_mode.progress) return void this.clear_drag_state();
                            s.id = n;
                            var r = gantt._get_mouse_pos(t);
                            s.start_x = r.x, s.start_y = r.y, s.obj = i, this.drag.start_drag = s
                        } else this.clear_drag_state();
                    else if (gantt.checkEvent("onMouseDown") && gantt.callEvent("onMouseDown", [a.split(" ")[0]]) && e.parentNode) return this.on_mouse_down(t, e.parentNode)
                }
            }
        },
        _fix_dnd_scale_time: function(t, e) {
            var n = gantt._tasks.unit,
                i = gantt._tasks.step;
            gantt.config.round_dnd_dates || (n = "minute", i = gantt.config.time_step), e.mode == gantt.config.drag_mode.resize ? e.left ? t.start_date = gantt.roundDate({
                date: t.start_date,
                unit: n,
                step: i
            }) : t.end_date = gantt.roundDate({
                date: t.end_date,
                unit: n,
                step: i
            }) : e.mode == gantt.config.drag_mode.move && (t.start_date = gantt.roundDate({
                date: t.start_date,
                unit: n,
                step: i
            }), t.end_date = gantt.calculateEndDate(t.start_date, t.duration, gantt.config.duration_unit))
        },
        _fix_working_times: function(t, e) {
            var e = e || {
                mode: gantt.config.drag_mode.move
            };
            gantt.config.work_time && gantt.config.correct_work_time && (e.mode == gantt.config.drag_mode.resize ? e.left ? t.start_date = gantt.getClosestWorkTime({
                date: t.start_date,
                dir: "future"
            }) : t.end_date = gantt.getClosestWorkTime({
                date: t.end_date,
                dir: "past"
            }) : e.mode == gantt.config.drag_mode.move && gantt.correctTaskWorkTime(t))
        },
        on_mouse_up: function(t) {
            var e = this.drag;
            if (e.mode && e.id) {
                var n = gantt.getTask(e.id);
                if (gantt.config.work_time && gantt.config.correct_work_time && this._fix_working_times(n, e), this._fix_dnd_scale_time(n, e), gantt._init_task_timing(n), this._fireEvent("before_finish", e.mode, [e.id, e.mode, dhtmlx.copy(e.obj), t])) {
                    var i = e.id;
                    gantt._init_task_timing(n), this._fireEvent("after_finish", e.mode, [i, e.mode, t]), this.clear_drag_state(), gantt.updateTask(n.id)
                } else e.obj._dhx_changed = !1, dhtmlx.mixin(n, e.obj, !0), gantt.updateTask(n.id)
            }
            this.clear_drag_state()
        },
        _get_drag_mode: function(t) {
            var e = gantt.config.drag_mode,
                n = (t || "").split(" "),
                i = n[0],
                a = {
                    mode: null,
                    left: null
                };
            switch (i) {
                case "gantt_task_line":
                case "gantt_task_content":
                    a.mode = e.move;
                    break;
                case "gantt_task_drag":
                    a.mode = e.resize, a.left = n[1] && -1 !== n[1].indexOf("left", n[1].length - "left".length) ? !0 : !1;
                    break;
                case "gantt_task_progress_drag":
                    a.mode = e.progress;
                    break;
                case "gantt_link_control":
                case "gantt_link_point":
                    a.mode = e.ignore;
                    break;
                default:
                    a = null
            }
            return a
        },
        _start_dnd: function(t) {
            var e = this.drag = this.drag.start_drag;
            delete e.start_drag;
            var n = gantt.config,
                i = e.id;
            n["drag_" + e.mode] && gantt.callEvent("onBeforeDrag", [i, e.mode, t]) && this._fireEvent("before_start", e.mode, [i, e.mode, t]) ? delete e.start_drag : this.clear_drag_state()
        },
        _fireEvent: function(t, e, n) {
            dhtmlx.assert(this._events[t], "Invalid stage:{" + t + "}");
            var i = this._events[t][e];
            return dhtmlx.assert(i, "Unknown after drop mode:{" + e + "}"), dhtmlx.assert(n, "Invalid event arguments"), gantt.checkEvent(i) ? gantt.callEvent(i, n) : !0
        }
    }, gantt.roundTaskDates = function(t) {
        var e = gantt._tasks_dnd.drag;
        e || (e = {
            mode: gantt.config.drag_mode.move
        }), gantt._tasks_dnd._fix_dnd_scale_time(t, e)
    }, gantt._render_link = function(t) {
        var e = this.getLink(t);
        gantt._linkRenderer.render_item(e, this.$task_links)
    }, gantt._get_link_type = function(t, e) {
        var n = null;
        return t && e ? n = gantt.config.links.start_to_start : !t && e ? n = gantt.config.links.finish_to_start : t || e ? t && !e && (n = gantt.config.links.start_to_finish) : n = gantt.config.links.finish_to_finish, n
    }, gantt.isLinkAllowed = function(t, e, n, i) {
        var a = null;
        if (a = "object" == typeof t ? t : {
                source: t,
                target: e,
                type: this._get_link_type(n, i)
            }, !a) return !1;
        if (!(a.source && a.target && a.type)) return !1;
        if (a.source == a.target) return !1;
        var s = !0;
        return this.checkEvent("onLinkValidation") && (s = this.callEvent("onLinkValidation", [a])), s
    }, gantt._render_link_element = function(t) {
        var e = this._path_builder.get_points(t),
            n = gantt._drawer,
            i = n.get_lines(e),
            a = document.createElement("div"),
            s = "gantt_task_link";
        t.color && (s += " gantt_link_inline_color");
        var r = this.templates.link_class ? this.templates.link_class(t) : "";
        r && (s += " " + r), this.config.highlight_critical_path && this.isCriticalLink && this.isCriticalLink(t) && (s += " gantt_critical_link"), a.className = s, a.setAttribute(gantt.config.link_attribute, t.id);
        for (var o = 0; o < i.length; o++) {
            o == i.length - 1 && (i[o].size -= gantt.config.link_arrow_size);
            var d = n.render_line(i[o], i[o + 1]);
            t.color && (d.firstChild.style.backgroundColor = t.color), a.appendChild(d)
        }
        var l = i[i.length - 1].direction,
            _ = gantt._render_link_arrow(e[e.length - 1], l);
        return t.color && (_.style.borderColor = t.color), a.appendChild(_), a
    }, gantt._render_link_arrow = function(t, e) {
        var n = document.createElement("div"),
            i = gantt._drawer,
            a = t.y,
            s = t.x,
            r = gantt.config.link_arrow_size,
            o = gantt.config.row_height,
            d = "gantt_link_arrow gantt_link_arrow_" + e;
        switch (e) {
            case i.dirs.right:
                a -= (r - o) / 2, s -= r;
                break;
            case i.dirs.left:
                a -= (r - o) / 2;
                break;
            case i.dirs.up:
                s -= (r - o) / 2;
                break;
            case i.dirs.down:
                a -= r, s -= (r - o) / 2
        }
        return n.style.cssText = ["top:" + a + "px", "left:" + s + "px"].join(";"), n.className = d, n
    }, gantt._drawer = {
        current_pos: null,
        dirs: {
            left: "left",
            right: "right",
            up: "up",
            down: "down"
        },
        path: [],
        clear: function() {
            this.current_pos = null, this.path = []
        },
        point: function(t) {
            this.current_pos = dhtmlx.copy(t)
        },
        get_lines: function(t) {
            this.clear(), this.point(t[0]);
            for (var e = 1; e < t.length; e++) this.line_to(t[e]);
            return this.get_path()
        },
        line_to: function(t) {
            var e = dhtmlx.copy(t),
                n = this.current_pos,
                i = this._get_line(n, e);
            this.path.push(i), this.current_pos = e
        },
        get_path: function() {
            return this.path
        },
        get_wrapper_sizes: function(t) {
            var e, n = gantt.config.link_wrapper_width,
                i = (gantt.config.link_line_width, t.y + (gantt.config.row_height - n) / 2);
            switch (t.direction) {
                case this.dirs.left:
                    e = {
                        top: i,
                        height: n,
                        lineHeight: n,
                        left: t.x - t.size - n / 2,
                        width: t.size + n
                    };
                    break;
                case this.dirs.right:
                    e = {
                        top: i,
                        lineHeight: n,
                        height: n,
                        left: t.x - n / 2,
                        width: t.size + n
                    };
                    break;
                case this.dirs.up:
                    e = {
                        top: i - t.size,
                        lineHeight: t.size + n,
                        height: t.size + n,
                        left: t.x - n / 2,
                        width: n
                    };
                    break;
                case this.dirs.down:
                    e = {
                        top: i,
                        lineHeight: t.size + n,
                        height: t.size + n,
                        left: t.x - n / 2,
                        width: n
                    }
            }
            return e
        },
        get_line_sizes: function(t) {
            var e, n = gantt.config.link_line_width,
                i = gantt.config.link_wrapper_width,
                a = t.size + n;
            switch (t.direction) {
                case this.dirs.left:
                case this.dirs.right:
                    e = {
                        height: n,
                        width: a,
                        marginTop: (i - n) / 2,
                        marginLeft: (i - n) / 2
                    };
                    break;
                case this.dirs.up:
                case this.dirs.down:
                    e = {
                        height: a,
                        width: n,
                        marginTop: (i - n) / 2,
                        marginLeft: (i - n) / 2
                    }
            }
            return e
        },
        render_line: function(t) {
            var e = this.get_wrapper_sizes(t),
                n = document.createElement("div");
            n.style.cssText = ["top:" + e.top + "px", "left:" + e.left + "px", "height:" + e.height + "px", "width:" + e.width + "px"].join(";"), n.className = "gantt_line_wrapper";
            var i = this.get_line_sizes(t),
                a = document.createElement("div");
            return a.style.cssText = ["height:" + i.height + "px", "width:" + i.width + "px", "margin-top:" + i.marginTop + "px", "margin-left:" + i.marginLeft + "px"].join(";"), a.className = "gantt_link_line_" + t.direction, n.appendChild(a), n
        },
        _get_line: function(t, e) {
            var n = this.get_direction(t, e),
                i = {
                    x: t.x,
                    y: t.y,
                    direction: this.get_direction(t, e)
                };
            return i.size = Math.abs(n == this.dirs.left || n == this.dirs.right ? t.x - e.x : t.y - e.y), i
        },
        get_direction: function(t, e) {
            var n = 0;
            return n = e.x < t.x ? this.dirs.left : e.x > t.x ? this.dirs.right : e.y > t.y ? this.dirs.down : this.dirs.up
        }
    }, gantt._y_from_ind = function(t) {
        return t * gantt.config.row_height
    }, gantt._path_builder = {
        path: [],
        clear: function() {
            this.path = []
        },
        current: function() {
            return this.path[this.path.length - 1]
        },
        point: function(t) {
            return t ? (this.path.push(dhtmlx.copy(t)), t) : this.current()
        },
        point_to: function(t, e, n) {
            n = n ? {
                x: n.x,
                y: n.y
            } : dhtmlx.copy(this.point());
            var i = gantt._drawer.dirs;
            switch (t) {
                case i.left:
                    n.x -= e;
                    break;
                case i.right:
                    n.x += e;
                    break;
                case i.up:
                    n.y -= e;
                    break;
                case i.down:
                    n.y += e
            }
            return this.point(n)
        },
        get_points: function(t) {
            var e = this.get_endpoint(t),
                n = gantt.config,
                i = e.e_y - e.y,
                a = e.e_x - e.x,
                s = gantt._drawer.dirs;
            this.clear(), this.point({
                x: e.x,
                y: e.y
            });
            var r = 2 * n.link_arrow_size,
                o = e.e_x > e.x;
            if (t.type == gantt.config.links.start_to_start) this.point_to(s.left, r), o ? (this.point_to(s.down, i), this.point_to(s.right, a)) : (this.point_to(s.right, a), this.point_to(s.down, i)), this.point_to(s.right, r);
            else if (t.type == gantt.config.links.finish_to_start)
                if (o = e.e_x > e.x + 2 * r, this.point_to(s.right, r), o) a -= r, this.point_to(s.down, i), this.point_to(s.right, a);
                else {
                    a -= 2 * r;
                    var d = i > 0 ? 1 : -1;
                    this.point_to(s.down, d * (n.row_height / 2)), this.point_to(s.right, a), this.point_to(s.down, d * (Math.abs(i) - n.row_height / 2)), this.point_to(s.right, r)
                } else if (t.type == gantt.config.links.finish_to_finish) this.point_to(s.right, r), o ? (this.point_to(s.right, a), this.point_to(s.down, i)) : (this.point_to(s.down, i), this.point_to(s.right, a)), this.point_to(s.left, r);
            else if (t.type == gantt.config.links.start_to_finish)
                if (o = e.e_x > e.x - 2 * r, this.point_to(s.left, r), o) {
                    a += 2 * r;
                    var d = i > 0 ? 1 : -1;
                    this.point_to(s.down, d * (n.row_height / 2)), this.point_to(s.right, a), this.point_to(s.down, d * (Math.abs(i) - n.row_height / 2)), this.point_to(s.left, r)
                } else a += r, this.point_to(s.down, i), this.point_to(s.right, a);
            return this.path
        },
        get_endpoint: function(t) {
            var e = gantt.config.links,
                n = !1,
                i = !1;
            t.type == e.start_to_start ? n = i = !0 : t.type == e.finish_to_finish ? n = i = !1 : t.type == e.finish_to_start ? (n = !1, i = !0) : t.type == e.start_to_finish ? (n = !0, i = !1) : dhtmlx.assert(!1, "Invalid link type");
            var a = gantt._get_task_visible_pos(gantt._pull[t.source], n),
                s = gantt._get_task_visible_pos(gantt._pull[t.target], i);
            return {
                x: a.x,
                e_x: s.x,
                y: a.y,
                e_y: s.y
            }
        }
    }, gantt._init_links_dnd = function() {
        function t(t, e, n) {
            var i = gantt._get_task_pos(t, !!e);
            return i.y += gantt._get_task_height() / 2, n = n || 0, i.x += (e ? -1 : 1) * n, i
        }

        function e(t) {
            var e = i(),
                n = ["gantt_link_tooltip"];
            e.from && e.to && n.push(gantt.isLinkAllowed(e.from, e.to, e.from_start, e.to_start) ? "gantt_allowed_link" : "gantt_invalid_link");
            var a = gantt.templates.drag_link_class(e.from, e.from_start, e.to, e.to_start);
            a && n.push(a);
            var s = "<div class='" + a + "'>" + gantt.templates.drag_link(e.from, e.from_start, e.to, e.to_start) + "</div>";
            t.innerHTML = s
        }

        function n(t, e) {
            t.style.left = e.x + 5 + "px", t.style.top = e.y + 5 + "px"
        }

        function i() {
            return {
                from: gantt._link_source_task,
                to: gantt._link_target_task,
                from_start: gantt._link_source_task_start,
                to_start: gantt._link_target_task_start
            }
        }

        function a() {
            gantt._link_source_task = gantt._link_source_task_start = gantt._link_target_task = null, gantt._link_target_task_start = !0
        }

        function s(t, e, n, a) {
            var s = d(),
                l = i(),
                _ = ["gantt_link_direction"];
            gantt.templates.link_direction_class && _.push(gantt.templates.link_direction_class(l.from, l.from_start, l.to, l.to_start));
            var h = Math.sqrt(Math.pow(n - t, 2) + Math.pow(a - e, 2));
            if (h = Math.max(0, h - 3)) {
                s.className = _.join(" ");
                var g = (a - e) / (n - t),
                    c = Math.atan(g);
                2 == o(t, n, e, a) ? c += Math.PI : 3 == o(t, n, e, a) && (c -= Math.PI);
                var u = Math.sin(c),
                    f = Math.cos(c),
                    p = Math.round(e),
                    m = Math.round(t),
                    v = ["-webkit-transform: rotate(" + c + "rad)", "-moz-transform: rotate(" + c + "rad)", "-ms-transform: rotate(" + c + "rad)", "-o-transform: rotate(" + c + "rad)", "transform: rotate(" + c + "rad)", "width:" + Math.round(h) + "px"];
                if (-1 != window.navigator.userAgent.indexOf("MSIE 8.0")) {
                    v.push('-ms-filter: "' + r(u, f) + '"');
                    var k = Math.abs(Math.round(t - n)),
                        x = Math.abs(Math.round(a - e));
                    switch (o(t, n, e, a)) {
                        case 1:
                            p -= x;
                            break;
                        case 2:
                            m -= k, p -= x;
                            break;
                        case 3:
                            m -= k
                    }
                }
                v.push("top:" + p + "px"), v.push("left:" + m + "px"), s.style.cssText = v.join(";")
            }
        }

        function r(t, e) {
            return "progid:DXImageTransform.Microsoft.Matrix(M11 = " + e + ",M12 = -" + t + ",M21 = " + t + ",M22 = " + e + ",SizingMethod = 'auto expand')"
        }

        function o(t, e, n, i) {
            return e >= t ? n >= i ? 1 : 4 : n >= i ? 2 : 3
        }

        function d() {
            return _._direction || (_._direction = document.createElement("div"), gantt.$task_links.appendChild(_._direction)), _._direction
        }

        function l() {
            _._direction && (_._direction.parentNode && _._direction.parentNode.removeChild(_._direction), _._direction = null)
        }
        var _ = new dhtmlxDnD(this.$task_bars, {
                sensitivity: 0,
                updates_per_second: 60
            }),
            h = "task_left",
            g = "task_right",
            c = "gantt_link_point",
            u = "gantt_link_control";
        _.attachEvent("onBeforeDragStart", dhtmlx.bind(function(e, n) {
            var i = n.target || n.srcElement;
            if (a(), gantt.getState().drag_id) return !1;
            if (gantt._locate_css(i, c)) {
                gantt._locate_css(i, h) && (gantt._link_source_task_start = !0);
                var s = gantt._link_source_task = this.locate(n),
                    r = gantt.getTask(s);
                if (gantt._is_readonly(r)) return a(), !1;
                var o = 0;
                return gantt._get_safe_type(r.type) == gantt.config.types.milestone && (o = (gantt._get_visible_milestone_width() - gantt._get_milestone_width()) / 2), this._dir_start = t(r, !!gantt._link_source_task_start, o), !0
            }
            return !1
        }, this)), _.attachEvent("onAfterDragStart", dhtmlx.bind(function() {
            e(_.config.marker)
        }, this)), _.attachEvent("onDragMove", dhtmlx.bind(function(i, a) {
            var r = _.config,
                o = _.getPosition(a);
            n(r.marker, o);
            var d = gantt._is_link_drop_area(a),
                l = gantt._link_target_task,
                h = gantt._link_landing,
                c = gantt._link_target_task_start,
                f = gantt.locate(a),
                p = !0;
            if (d && (p = !gantt._locate_css(a, g), d = !!f), gantt._link_target_task = f, gantt._link_landing = d, gantt._link_target_task_start = p, d) {
                var m = gantt.getTask(f),
                    v = gantt._locate_css(a, u),
                    k = 0;
                v && (k = Math.floor(v.offsetWidth / 2)), this._dir_end = t(m, !!gantt._link_target_task_start, k)
            } else this._dir_end = gantt._get_mouse_pos(a);
            var x = !(h == d && l == f && c == p);
            return x && (l && gantt.refreshTask(l, !1), f && gantt.refreshTask(f, !1)), x && e(r.marker), s(this._dir_start.x, this._dir_start.y, this._dir_end.x, this._dir_end.y), !0
        }, this)), _.attachEvent("onDragEnd", dhtmlx.bind(function() {
            var t = i();
            if (t.from && t.to && t.from != t.to) {
                var e = gantt._get_link_type(t.from_start, t.to_start),
                    n = {
                        source: t.from,
                        target: t.to,
                        type: e
                    };
                n.type && gantt.isLinkAllowed(n) && gantt.addLink(n)
            }
            a(), t.from && gantt.refreshTask(t.from, !1), t.to && gantt.refreshTask(t.to, !1), l()
        }, this)), gantt._is_link_drop_area = function(t) {
            return !!gantt._locate_css(t, u)
        }
    }, gantt._get_link_state = function() {
        return {
            link_landing_area: this._link_landing,
            link_target_id: this._link_target_task,
            link_target_start: this._link_target_task_start,
            link_source_id: this._link_source_task,
            link_source_start: this._link_source_task_start
        }
    }, gantt._init_tasks = function() {
        function t(t, e, n, i) {
            for (var a = 0; a < t.length; a++) t[a].change_id(e, n), t[a].render_item(i)
        }
        this._tasks = {
            col_width: this.config.columnWidth,
            width: [],
            full_width: 0,
            trace_x: [],
            rendered: {}
        }, this._click.gantt_task_link = dhtmlx.bind(function(t) {
            var e = this.locate(t, gantt.config.link_attribute);
            e && this.callEvent("onLinkClick", [e, t])
        }, this), this._click.gantt_scale_cell = dhtmlx.bind(function(t) {
            var e = gantt._get_mouse_pos(t),
                n = gantt._date_from_pos(e.x),
                i = Math.floor(gantt._day_index_by_date(n)),
                a = gantt._tasks.trace_x[i];
            gantt.callEvent("onScaleClick", [t, a])
        }, this), this._dbl_click.gantt_task_link = dhtmlx.bind(function(t, e) {
            var e = this.locate(t, gantt.config.link_attribute);
            this._delete_link_handler(e, t)
        }, this), this._dbl_click.gantt_link_point = dhtmlx.bind(function(t, e, n) {
            var e = this.locate(t),
                i = this.getTask(e),
                a = null;
            return n.parentNode && n.parentNode.className && (a = n.parentNode.className.indexOf("_left") > -1 ? i.$target[0] : i.$source[0]), a && this._delete_link_handler(a, t), !1
        }, this), this._tasks_dnd.init(), this._init_links_dnd();
        var e = this._create_filter("_filter_task", "_is_grid_visible"),
            n = this._create_filter("_filter_task", "_is_chart_visible"),
            i = this._create_filter("_filter_link", "_is_chart_visible"),
            a = this._create_filter("_filter_task", "_is_chart_visible", "_is_std_background");
        this._task_renderers = {}, this._linkRenderer = this._task_renderer("links", this._render_link_element, this.$task_links, i), this._taskRenderer = this._task_renderers.task = this._task_renderer("task", this._render_task_element, this.$task_bars, n), this._task_renderers.grid = this._task_renderer("grid", this._render_grid_item, this.$grid_data, e), this._task_renderers.bg = this._task_renderer("bg", this._render_bg_line, this.$task_bg, a), this.attachEvent("onTaskIdChange", function(e, n) {
            var i = this._get_task_renderers();
            t(i, e, n, this.getTask(n))
        }), this.attachEvent("onLinkIdChange", function(e, n) {
            var i = this._get_link_renderers();
            t(i, e, n, this.getLink(n))
        })
    }, gantt._create_filter = function(t) {
        return t instanceof Array || (t = Array.prototype.slice.call(arguments, 0)),
            function(e) {
                for (var n = !0, i = 0, a = t.length; a > i; i++) {
                    var s = t[i];
                    gantt[s] && (n = n && gantt[s].apply(gantt, [e.id, e]) !== !1)
                }
                return n
            }
    }, gantt._is_chart_visible = function() {
        return !!this.config.show_chart
    }, gantt._filter_task = function(t, e) {
        var n = null,
            i = null;
        return this.config.start_date && this.config.end_date && (n = this.config.start_date.valueOf(), i = this.config.end_date.valueOf(), +e.start_date > i || +e.end_date < +n) ? !1 : !0
    }, gantt._filter_link = function(t, e) {
        return this.config.show_links && gantt.isTaskVisible(e.source) && gantt.isTaskVisible(e.target) ? this.callEvent("onBeforeLinkDisplay", [t, e]) : !1
    }, gantt._is_std_background = function() {
        return !this.config.static_background
    }, gantt._task_layers = [], gantt._task_renderers = {}, gantt._get_task_renderers = function() {
        var t = [];
        for (var e in this._task_renderers) t.push(this._task_renderers[e]);
        return t
    }, gantt._get_link_renderers = function() {
        return [this._linkRenderer]
    }, gantt._delete_link_handler = function(t, e) {
        if (t && this.callEvent("onLinkDblClick", [t, e])) {
            var n = gantt.getLink(t);
            if (gantt._is_readonly(n)) return;
            var i = "",
                a = gantt.locale.labels.link + " " + this.templates.link_description(this.getLink(t)) + " " + gantt.locale.labels.confirm_link_deleting;
            window.setTimeout(function() {
                gantt._dhtmlx_confirm(a, i, function() {
                    gantt.deleteLink(t)
                })
            }, gantt.config.touch ? 300 : 1)
        }
    }, gantt.getTaskNode = function(t) {
        return this._taskRenderer.rendered[t]
    }, gantt.getLinkNode = function(t) {
        return this._linkRenderer.rendered[t]
    }, gantt._get_tasks_data = function() {
        for (var t = [], e = 0; e < this._order.length; e++) {
            var n = this._pull[this._order[e]];
            n.$index = e, this.resetProjectDates(n), t.push(n)
        }
        return t
    }, gantt._get_links_data = function() {
        var t = [];
        for (var e in this._lpull) t.push(this._lpull[e]);
        return t
    }, gantt._render_data = function() {
        this._sync_order(), this._update_layout_sizes(), this.config.static_background && this._render_bg_canvas();
        for (var t = this._get_tasks_data(), e = this._get_task_renderers(), n = 0; n < e.length; n++) e[n].render_items(t);
        var i = gantt._get_links_data();
        e = this._get_link_renderers();
        for (var n = 0; n < e.length; n++) e[n].render_items(i);
        this.callEvent("onDataRender", [])
    }, gantt._update_layout_sizes = function() {
        var t = this._tasks;
        t.bar_height = this._get_task_height(), this.$task_data.style.height = Math.max(this.$task.offsetHeight - this.config.scale_height, 0) + "px", this.$task_bg.style.height = "", this.$task_bg.style.backgroundImage = "";
        for (var e = this.$task_data.childNodes, n = 0, i = e.length; i > n; n++) {
            var a = e[n];
            this._is_layer(a) && a.style && (a.style.width = t.full_width + "px")
        }
        if (this._is_grid_visible()) {
            for (var s = this.getGridColumns(), r = 0, n = 0; n < s.length; n++) r += s[n].width;
            this.$grid_data.style.width = Math.max(r - 1, 0) + "px"
        }
    }, gantt._scale_range_unit = function() {
        var t = this.config.scale_unit;
        if (this.config.scale_offset_minimal) {
            var e = this._get_scales();
            t = e[e.length - 1].unit
        }
        return t
    }, gantt._init_tasks_range = function() {
        var t = this._scale_range_unit();
        if (this.config.start_date && this.config.end_date) return this._min_date = this.date[t + "_start"](new Date(this.config.start_date)), void(this._max_date = this.date[t + "_start"](new Date(this.config.end_date)));
        this._get_tasks_data();
        var e = this.getSubtaskDates();
        this._min_date = e.start_date, this._max_date = e.end_date, this._max_date && this._max_date || (this._min_date = new Date, this._max_date = new Date(this._min_date)), this._min_date = this.date[t + "_start"](this._min_date), this._min_date = this.calculateEndDate(this.date[t + "_start"](this._min_date), -1, t), this._max_date = this.date[t + "_start"](this._max_date), this._max_date = this.calculateEndDate(this._max_date, 2, t)
    }, gantt._prepare_scale_html = function(t) {
        var e = [],
            n = null,
            i = null,
            a = null;
        (t.template || t.date) && (i = t.template || this.date.date_to_str(t.date)), a = t.css || function() {}, !t.css && this.config.inherit_scale_class && (a = gantt.templates.scale_cell_class);
        for (var s = 0; s < t.count; s++) {
            n = new Date(t.trace_x[s]);
            var r = i.call(this, n),
                o = t.width[s],
                d = "",
                l = "",
                _ = "";
            if (o) {
                d = "width:" + o + "px;", _ = "gantt_scale_cell" + (s == t.count - 1 ? " gantt_last_cell" : ""), l = a.call(this, n), l && (_ += " " + l);
                var h = "<div class='" + _ + "' style='" + d + "'>" + r + "</div>";
                e.push(h)
            }
        }
        return e.join("")
    }, gantt._get_scales = function() {
        var t = this._scale_helpers,
            e = [t.primaryScale()].concat(this.config.subscales);
        return t.sortScales(e), e
    }, gantt._render_tasks_scales = function() {
        this._init_tasks_range(), this._scroll_resize(), this._set_sizes();
        var t = "",
            e = 0,
            n = 0,
            i = 0;
        if (this._is_chart_visible()) {
            var a = this._scale_helpers,
                s = this._get_scales();
            i = this.config.scale_height - 1;
            for (var r = this._get_resize_options(), o = r.x ? Math.max(this.config.autosize_min_width, 0) : this.$task.offsetWidth, d = a.prepareConfigs(s, this.config.min_column_width, o, i), l = this._tasks = d[d.length - 1], _ = [], h = this.templates.scale_row_class, g = 0; g < d.length; g++) {
                var c = "gantt_scale_line",
                    u = h(d[g]);
                u && (c += " " + u), _.push('<div class="' + c + '" style="height:' + d[g].height + "px;line-height:" + d[g].height + 'px">' + this._prepare_scale_html(d[g]) + "</div>")
            }
            t = _.join(""), e = l.full_width + this.$scroll_ver.offsetWidth + "px", n = l.full_width + "px", i += "px"
        }
        this.$task.style.display = this._is_chart_visible() ? "" : "none", this.$task_scale.style.height = i, this.$task_data.style.width = this.$task_scale.style.width = e, this.$task_scale.innerHTML = t
    }, gantt._render_bg_line = function(t) {
        var e = gantt._tasks,
            n = e.count,
            i = document.createElement("div");
        if (gantt.config.show_task_cells)
            for (var a = 0; n > a; a++) {
                var s = e.width[a],
                    r = "";
                if (s > 0) {
                    var o = document.createElement("div");
                    o.style.width = s + "px", r = "gantt_task_cell" + (a == n - 1 ? " gantt_last_cell" : ""), l = this.templates.task_cell_class(t, e.trace_x[a]), l && (r += " " + l), o.className = r, i.appendChild(o)
                }
            }
        var d = t.$index % 2 !== 0,
            l = gantt.templates.task_row_class(t.start_date, t.end_date, t),
            _ = "gantt_task_row" + (d ? " odd" : "") + (l ? " " + l : "");
        return this.getState().selected_task == t.id && (_ += " gantt_selected"), i.className = _, i.style.height = gantt.config.row_height + "px", i.setAttribute(this.config.task_attribute, t.id), i
    }, gantt._render_bg_canvas = function() {}, gantt._adjust_scales = function() {
        if (this.config.fit_tasks) {
            var t = +this._min_date,
                e = +this._max_date;
            if (this._init_tasks_range(), +this._min_date != t || +this._max_date != e) return this.render(), this.callEvent("onScaleAdjusted", []), !0
        }
        return !1
    }, gantt.refreshTask = function(t, e) {
        var n = this._get_task_renderers(),
            i = this.getTask(t);
        if (i && this.isTaskVisible(t)) {
            for (var a = 0; a < n.length; a++) n[a].render_item(i);
            if (void 0 !== e && !e) return;
            for (var a = 0; a < i.$source.length; a++) gantt.refreshLink(i.$source[a]);
            for (var a = 0; a < i.$target.length; a++) gantt.refreshLink(i.$target[a])
        } else this._render_data()
    }, gantt.refreshLink = function(t) {
        this.isLinkExists(t) ? gantt._render_link(t) : gantt._linkRenderer.remove_item(t)
    }, gantt._combine_item_class = function(t, e, n) {
        var i = [t];
        e && i.push(e);
        var a = gantt.getState(),
            s = this.getTask(n);
        this._get_safe_type(s.type) == this.config.types.milestone && i.push("gantt_milestone"), this._get_safe_type(s.type) == this.config.types.project && i.push("gantt_project"), this._is_flex_task(s) && i.push("gantt_dependent_task"), this.config.select_task && n == a.selected_task && i.push("gantt_selected"), n == a.drag_id && (i.push("gantt_drag_" + a.drag_mode), a.touch_drag && i.push("gantt_touch_" + a.drag_mode));
        var r = gantt._get_link_state();
        if (r.link_source_id == n && i.push("gantt_link_source"), r.link_target_id == n && i.push("gantt_link_target"), this.config.highlight_critical_path && this.isCriticalTask && this.isCriticalTask(s) && i.push("gantt_critical_task"), r.link_landing_area && r.link_target_id && r.link_source_id && r.link_target_id != r.link_source_id) {
            var o = r.link_source_id,
                d = r.link_source_start,
                l = r.link_target_start,
                _ = gantt.isLinkAllowed(o, n, d, l),
                h = "";
            h = _ ? l ? "link_start_allow" : "link_finish_allow" : l ? "link_start_deny" : "link_finish_deny", i.push(h)
        }
        return i.join(" ")
    }, gantt._render_pair = function(t, e, n, i) {
        var a = gantt.getState(); + n.end_date <= +a.max_date && t.appendChild(i(e + " task_right")), +n.start_date >= +a.min_date && t.appendChild(i(e + " task_left"))
    }, gantt._get_task_height = function() {
        var t = this.config.task_height;
        return "full" == t && (t = this.config.row_height - 5), t = Math.min(t, this.config.row_height), Math.max(t, 0)
    }, gantt._get_milestone_width = function() {
        return this._get_task_height()
    }, gantt._get_visible_milestone_width = function() {
        var t = gantt._get_task_height();
        return Math.sqrt(2 * t * t)
    }, gantt.getTaskPosition = function(t, e, n) {
        var i = this.posFromDate(e || t.start_date),
            a = this.posFromDate(n || t.end_date);
        a = Math.max(i, a);
        var s = this.getTaskTop(t.id),
            r = this.config.task_height;
        return {
            left: i,
            top: s,
            height: r,
            width: Math.max(a - i, 0)
        }
    }, gantt._get_task_width = function(t) {
        return Math.round(this._get_task_pos(t, !1).x - this._get_task_pos(t, !0).x)
    }, gantt._is_readonly = function(t) {
        return t && t[this.config.editable_property] ? !1 : t && t[this.config.readonly_property] || this.config.readonly
    }, gantt._task_default_render = function(t) {
        var e = this._get_task_pos(t),
            n = this.config,
            i = this._get_task_height(),
            a = Math.floor((this.config.row_height - i) / 2);
        this._get_safe_type(t.type) == n.types.milestone && n.link_line_width > 1 && (a += 1);
        var s = document.createElement("div"),
            r = gantt._get_task_width(t),
            o = this._get_safe_type(t.type);
        s.setAttribute(this.config.task_attribute, t.id), n.show_progress && o != this.config.types.milestone && this._render_task_progress(t, s, r);
        var d = gantt._render_task_content(t, r);
        t.textColor && (d.style.color = t.textColor), s.appendChild(d);
        var l = this._combine_item_class("gantt_task_line", this.templates.task_class(t.start_date, t.end_date, t), t.id);
        (t.color || t.progressColor || t.textColor) && (l += " gantt_task_inline_color"), s.className = l;
        var _ = ["left:" + e.x + "px", "top:" + (a + e.y) + "px", "height:" + i + "px", "line-height:" + i + "px", "width:" + r + "px"];
        t.color && _.push("background-color:" + t.color), t.textColor && _.push("color:" + t.textColor), s.style.cssText = _.join(";");
        var h = this._render_leftside_content(t);
        return h && s.appendChild(h), h = this._render_rightside_content(t), h && s.appendChild(h), this._is_readonly(t) || (n.drag_resize && !this._is_flex_task(t) && o != this.config.types.milestone && gantt._render_pair(s, "gantt_task_drag", t, function(t) {
            var e = document.createElement("div");
            return e.className = t, e
        }), n.drag_links && this.config.show_links && gantt._render_pair(s, "gantt_link_control", t, function(t) {
            var e = document.createElement("div");
            e.className = t, e.style.cssText = ["height:" + i + "px", "line-height:" + i + "px"].join(";");
            var n = document.createElement("div");
            return n.className = "gantt_link_point", e.appendChild(n), e
        })), s
    }, gantt._render_task_element = function(t) {
        var e = this.config.type_renderers,
            n = e[this._get_safe_type(t.type)];
        return n || (n = this._task_default_render), n.apply(this, arguments)
    }, gantt._render_side_content = function(t, e, n) {
        if (!e) return null;
        var i = e(t.start_date, t.end_date, t);
        if (!i) return null;
        var a = document.createElement("div");
        return a.className = "gantt_side_content " + n, a.innerHTML = i, a
    }, gantt._render_leftside_content = function(t) {
        var e = "gantt_left " + gantt._get_link_crossing_css(!0, t);
        return gantt._render_side_content(t, this.templates.leftside_text, e)
    }, gantt._render_rightside_content = function(t) {
        var e = "gantt_right " + gantt._get_link_crossing_css(!1, t);
        return gantt._render_side_content(t, this.templates.rightside_text, e)
    }, gantt._get_conditions = function(t) {
        return t ? {
            $source: [gantt.config.links.start_to_start],
            $target: [gantt.config.links.start_to_start, gantt.config.links.finish_to_start]
        } : {
            $source: [gantt.config.links.finish_to_start, gantt.config.links.finish_to_finish],
            $target: [gantt.config.links.finish_to_finish]
        }
    }, gantt._get_link_crossing_css = function(t, e) {
        var n = gantt._get_conditions(t);
        for (var i in n)
            for (var a = e[i], s = 0; s < a.length; s++)
                for (var r = gantt.getLink(a[s]), o = 0; o < n[i].length; o++)
                    if (r.type == n[i][o]) return "gantt_link_crossing";
        return ""
    }, gantt._render_task_content = function(t) {
        var e = document.createElement("div");
        return this._get_safe_type(t.type) != this.config.types.milestone && (e.innerHTML = this.templates.task_text(t.start_date, t.end_date, t)), e.className = "gantt_task_content", e
    }, gantt._render_task_progress = function(t, e, n) {
        var i = 1 * t.progress || 0;
        n = Math.max(n - 2, 0);
        var a = document.createElement("div"),
            s = Math.round(n * i);
        if (s = Math.min(n, s), t.progressColor && (a.style.backgroundColor = t.progressColor, a.style.opacity = 1), a.style.width = s + "px", a.className = "gantt_task_progress", a.innerHTML = this.templates.progress_text(t.start_date, t.end_date, t), e.appendChild(a), this.config.drag_progress && !gantt._is_readonly(t)) {
            var r = document.createElement("div");
            r.style.left = s + "px", r.className = "gantt_task_progress_drag", a.appendChild(r), e.appendChild(r)
        }
    }, gantt._get_line = function(t) {
        var e = {
            second: 1,
            minute: 60,
            hour: 3600,
            day: 86400,
            week: 604800,
            month: 2592e3,
            year: 31536e3
        };
        return e[t] || 0
    }, gantt._date_from_pos = function(t) {
        var e = this._tasks;
        if (0 > t || t > e.full_width || !e.full_width) return null;
        for (var n = 0, i = 0; i + e.width[n] < t;) i += e.width[n], n++;
        var a = e.width[n] || e.col_width,
            s = 0;
        a && (s = (t - i) / a);
        var r = gantt._get_coll_duration(e, e.trace_x[n]),
            o = new Date(e.trace_x[n].valueOf() + Math.round(s * r));
        return o
    }, gantt.posFromDate = function(t) {
        var e = gantt._day_index_by_date(t);
        dhtmlx.assert(e >= 0, "Invalid day index");
        for (var n = Math.floor(e), i = e % 1, a = 0, s = 1; n >= s; s++) a += gantt._tasks.width[s - 1];
        return i && (a += n < gantt._tasks.width.length ? gantt._tasks.width[n] * (i % 1) : 1), a
    }, gantt._day_index_by_date = function(t) {
        var e = new Date(t).valueOf(),
            n = gantt._tasks.trace_x,
            i = gantt._tasks.ignore_x;
        if (e <= this._min_date) return 0;
        if (e >= this._max_date) return n.length;
        for (var a = null, s = 0, r = n.length - 1; r > s && (a = +n[s + 1], !(a > e) || i[a]); s++);
        return n[s] ? s + (t - n[s]) / gantt._get_coll_duration(gantt._tasks, n[s]) : 0
    }, gantt._get_coll_duration = function(t, e) {
        return gantt.date.add(e, t.step, t.unit) - e
    }, gantt._get_x_pos = function(t, e) {
        e = e !== !1;
        gantt.posFromDate(e ? t.start_date : t.end_date)
    }, gantt.getTaskTop = function(t) {
        return this._y_from_ind(this._get_visible_order(t))
    }, gantt._get_task_coord = function(t, e, n) {
        e = e !== !1, n = n || 0;
        var i = this._get_safe_type(t.type) == this.config.types.milestone,
            a = null;
        a = e || i ? t.start_date || this._default_task_date(t) : t.end_date || this.calculateEndDate(this._default_task_date(t));
        var s = this.posFromDate(a),
            r = this.getTaskTop(t.id);
        return i && (e ? s -= n : s += n), {
            x: s,
            y: r
        }
    }, gantt._get_task_pos = function(t, e) {
        e = e !== !1;
        var n = gantt._get_milestone_width() / 2;
        return this._get_task_coord(t, e, n)
    }, gantt._get_task_visible_pos = function(t, e) {
        e = e !== !1;
        var n = gantt._get_visible_milestone_width() / 2;
        return this._get_task_coord(t, e, n)
    }, gantt._correct_shift = function(t, e) {
        return t -= 6e4 * (new Date(gantt._min_date).getTimezoneOffset() - new Date(t).getTimezoneOffset()) * (e ? -1 : 1)
    }, gantt._get_mouse_pos = function(t) {
        if (t.pageX || t.pageY) var e = {
            x: t.pageX,
            y: t.pageY
        };
        var n = _isIE ? document.documentElement : document.body,
            e = {
                x: t.clientX + n.scrollLeft - n.clientLeft,
                y: t.clientY + n.scrollTop - n.clientTop
            },
            i = gantt._get_position(gantt.$task_data);
        return e.x = e.x - i.x + gantt.$task_data.scrollLeft, e.y = e.y - i.y + gantt.$task_data.scrollTop, e
    }, gantt._is_layer = function(t) {
        return t && t.hasAttribute && t.hasAttribute(this.config.layer_attribute)
    }, gantt._task_renderer = function(t, e, n, i) {
        return this._task_area_pulls || (this._task_area_pulls = {}), this._task_area_renderers || (this._task_area_renderers = {}), this._task_area_renderers[t] ? this._task_area_renderers[t] : (e || dhtmlx.assert(!1, "Invalid renderer call"), n && n.setAttribute(this.config.layer_attribute, !0), this._task_area_renderers[t] = {
            render_item: function(a, s) {
                var r = gantt._task_area_pulls[t];
                if (s = s || n, i && !i(a)) return void this.remove_item(a.id);
                var o = e.call(gantt, a);
                o && (r[a.id] ? this.replace_item(a.id, o) : (r[a.id] = o, s.appendChild(o)))
            },
            clear: function(e) {
                this.rendered = gantt._task_area_pulls[t] = {}, e = e || n, e && (e.innerHTML = "")
            },
            render_items: function(t, e) {
                e = e || n, this.clear(e);
                for (var i = document.createDocumentFragment(), a = 0, s = t.length; s > a; a++) this.render_item(t[a], i);
                e.appendChild(i)
            },
            replace_item: function(t, e) {
                var n = this.rendered[t];
                n && n.parentNode && n.parentNode.replaceChild(e, n), this.rendered[t] = e
            },
            remove_item: function(t) {
                var e = this.rendered[t];
                e && e.parentNode && e.parentNode.removeChild(e), delete this.rendered[t]
            },
            change_id: function(t, e) {
                this.rendered[e] = this.rendered[t], delete this.rendered[t]
            },
            rendered: this._task_area_pulls[t],
            node: n,
            unload: function() {
                this.clear(), delete gantt._task_area_renderers[t], delete gantt._task_area_pulls[t]
            }
        }, this._task_area_renderers[t])
    }, gantt._clear_renderers = function() {
        for (var t in this._task_area_renderers) this._task_renderer(t).unload()
    }, gantt._pull = {}, gantt._branches = {}, gantt._order = [], gantt._lpull = {}, gantt.load = function(t, e, n) {
        this._load_url = t, dhtmlx.assert(arguments.length, "Invalid load arguments"), this.callEvent("onLoadStart", []);
        var i = "json",
            a = null;
        arguments.length >= 3 ? (i = e, a = n) : "string" == typeof arguments[1] ? i = arguments[1] : "function" == typeof arguments[1] && (a = arguments[1]), this._load_type = i, dhtmlxAjax.get(t, dhtmlx.bind(function(t) {
            this.on_load(t, i), this.callEvent("onLoadEnd", []), "function" == typeof a && a.call(this)
        }, this))
    }, gantt.parse = function(t, e) {
        this.on_load({
            xmlDoc: {
                responseText: t
            }
        }, e)
    }, gantt.serialize = function(t) {
        return t = t || "json", this[t].serialize()
    }, gantt.on_load = function(t, e) {
        e || (e = "json"), dhtmlx.assert(this[e], "Invalid data type:'" + e + "'");
        var n = t.xmlDoc.responseText,
            i = this[e].parse(n, t);
        this._process_loading(i)
    }, gantt._process_loading = function(t) {
        t.collections && this._load_collections(t.collections);
        for (var e = t.data, n = 0; n < e.length; n++) {
            var i = e[n];
            this._init_task(i), this.callEvent("onTaskLoading", [i]) && (this._pull[i.id] = i, this._add_branch(i, !0))
        }
        this._sync_order();
        for (var n in this._pull) this._pull[n].$level = this.calculateTaskLevel(this._pull[n]);
        if (this._init_links(t.links || (t.collections ? t.collections.links : [])), this.render(), this.config.initial_scroll) {
            var a = this._order[0] || this.config.root_id;
            a && this.showTask(a)
        }
    }, gantt._init_links = function(t) {
        if (t)
            for (var e = 0; e < t.length; e++)
                if (t[e]) {
                    var n = this._init_link(t[e]);
                    this._lpull[n.id] = n
                }
        this._sync_links()
    }, gantt._load_collections = function(t) {
        var e = !1;
        for (var n in t)
            if (t.hasOwnProperty(n)) {
                e = !0;
                var i = t[n],
                    a = this.serverList[n];
                if (!a) continue;
                a.splice(0, a.length);
                for (var s = 0; s < i.length; s++) {
                    var r = i[s],
                        o = dhtmlx.copy(r);
                    o.key = o.value;
                    for (var d in r)
                        if (r.hasOwnProperty(d)) {
                            if ("value" == d || "label" == d) continue;
                            o[d] = r[d]
                        }
                    a.push(o)
                }
            }
        e && this.callEvent("onOptionsLoad", [])
    }, gantt._sync_order = function(t) {
        this._order = [], this._sync_order_item({
            parent: this.config.root_id,
            $open: !0,
            $ignore: !0,
            id: this.config.root_id
        }), t || (this._scroll_resize(), this._set_sizes())
    }, gantt.attachEvent("onBeforeTaskDisplay", function(t, e) {
        return !e.$ignore
    }), gantt._sync_order_item = function(t) {
        if (t.id && this._filter_task(t.id, t) && this.callEvent("onBeforeTaskDisplay", [t.id, t]) && this._order.push(t.id), t.$open) {
            var e = this._branches[t.id];
            if (e)
                for (var n = 0; n < e.length; n++) this._sync_order_item(this._pull[e[n]])
        }
    }, gantt._get_visible_order = function(t) {
        dhtmlx.assert(t, "Invalid argument");
        for (var e = this._order, n = 0, i = e.length; i > n; n++)
            if (e[n] == t) return n;
        return -1
    }, gantt.eachTask = function(t, e, n) {
        e = e || this.config.root_id, n = n || this;
        var i = this._branches[e];
        if (i)
            for (var a = 0; a < i.length; a++) {
                var s = this._pull[i[a]];
                t.call(n, s), this._branches[s.id] && this.eachTask(t, s.id, n)
            }
    }, gantt.json = {
        parse: function(data) {
            return dhtmlx.assert(data, "Invalid data"), "string" == typeof data && (window.JSON ? data = JSON.parse(data) : (gantt._temp = eval("(" + data + ")"), data = gantt._temp || {}, gantt._temp = null)), data.dhx_security && (dhtmlx.security_key = data.dhx_security), data
        },
        _copyLink: function(t) {
            var e = {};
            for (var n in t) e[n] = t[n];
            return e
        },
        _copyObject: function(t) {
            var e = {};
            for (var n in t) "$" != n.charAt(0) && (e[n] = t[n], e[n] instanceof Date && (e[n] = gantt.templates.xml_format(e[n])));
            return e
        },
        serialize: function() {
            var t = [],
                e = [];
            gantt.eachTask(function(e) {
                gantt.resetProjectDates(e), t.push(this._copyObject(e))
            }, gantt.config.root_id, this);
            for (var n in gantt._lpull) e.push(this._copyLink(gantt._lpull[n]));
            return {
                data: t,
                links: e
            }
        }
    }, gantt.xml = {
        _xmlNodeToJSON: function(t, e) {
            for (var n = {}, i = 0; i < t.attributes.length; i++) n[t.attributes[i].name] = t.attributes[i].value;
            if (!e) {
                for (var i = 0; i < t.childNodes.length; i++) {
                    var a = t.childNodes[i];
                    1 == a.nodeType && (n[a.tagName] = a.firstChild ? a.firstChild.nodeValue : "")
                }
                n.text || (n.text = t.firstChild ? t.firstChild.nodeValue : "")
            }
            return n
        },
        _getCollections: function(t) {
            for (var e = {}, n = t.doXPath("//coll_options"), i = 0; i < n.length; i++)
                for (var a = n[i].getAttribute("for"), s = e[a] = [], r = t.doXPath(".//item", n[i]), o = 0; o < r.length; o++) {
                    for (var d = r[o], l = d.attributes, _ = {
                            key: r[o].getAttribute("value"),
                            label: r[o].getAttribute("label")
                        }, h = 0; h < l.length; h++) {
                        var g = l[h];
                        "value" != g.nodeName && "label" != g.nodeName && (_[g.nodeName] = g.nodeValue)
                    }
                    s.push(_)
                }
            return e
        },
        _getXML: function(t, e, n) {
            n = n || "data", e.getXMLTopNode || (e = new dtmlXMLLoaderObject(function() {}), e.loadXMLString(t));
            var i = e.getXMLTopNode(n);
            if (i.tagName != n) throw "Invalid XML data";
            var a = i.getAttribute("dhx_security");
            return a && (dhtmlx.security_key = a), e
        },
        parse: function(t, e) {
            e = this._getXML(t, e);
            for (var n = {}, i = n.data = [], a = e.doXPath("//task"), s = 0; s < a.length; s++) i[s] = this._xmlNodeToJSON(a[s]);
            return n.collections = this._getCollections(e), n
        },
        _copyLink: function(t) {
            return "<item id='" + t.id + "' source='" + t.source + "' target='" + t.target + "' type='" + t.type + "' />"
        },
        _copyObject: function(t) {
            return "<task id='" + t.id + "' parent='" + (t.parent || "") + "' start_date='" + t.start_date + "' duration='" + t.duration + "' open='" + !!t.open + "' progress='" + t.progress + "' end_date='" + t.end_date + "'><![CDATA[" + t.text + "]]></task>"
        },
        serialize: function() {
            for (var t = [], e = [], n = gantt.json.serialize(), i = 0, a = n.data.length; a > i; i++) t.push(this._copyObject(n.data[i]));
            for (var i = 0, a = n.links.length; a > i; i++) e.push(this._copyLink(n.links[i]));
            return "<data>" + t.join("") + "<coll_options for='links'>" + e.join("") + "</coll_options></data>"
        }
    }, gantt.oldxml = {
        parse: function(t, e) {
            e = gantt.xml._getXML(t, e, "projects");
            for (var n = {
                    collections: {
                        links: []
                    }
                }, i = n.data = [], a = e.doXPath("//task"), s = 0; s < a.length; s++) {
                i[s] = gantt.xml._xmlNodeToJSON(a[s]);
                var r = a[s].parentNode;
                i[s].parent = "project" == r.tagName ? "project-" + r.getAttribute("id") : r.parentNode.getAttribute("id")
            }
            a = e.doXPath("//project");
            for (var s = 0; s < a.length; s++) {
                var o = gantt.xml._xmlNodeToJSON(a[s], !0);
                o.id = "project-" + o.id, i.push(o)
            }
            for (var s = 0; s < i.length; s++) {
                var o = i[s];
                o.start_date = o.startdate || o.est, o.end_date = o.enddate, o.text = o.name, o.duration = o.duration / 8, o.open = 1, o.duration || o.end_date || (o.duration = 1), o.predecessortasks && n.collections.links.push({
                    target: o.id,
                    source: o.predecessortasks,
                    type: gantt.config.links.finish_to_start
                })
            }
            return n
        },
        serialize: function() {
            dhtmlx.message("Serialization to 'old XML' is not implemented")
        }
    }, gantt.serverList = function(t, e) {
        return e ? this.serverList[t] = e.slice(0) : this.serverList[t] || (this.serverList[t] = []), this.serverList[t]
    }, gantt._working_time_helper = {
        units: ["year", "month", "week", "day", "hour", "minute"],
        hours: [8, 17],
        dates: {
            0: !1,
            6: !1
        },
        _get_unit_order: function(t) {
            for (var e = 0, n = this.units.length; n > e; e++)
                if (this.units[e] == t) return e;
            dhtmlx.assert(!1, "Incorrect duration unit")
        },
        _timestamp: function(t) {
            var e = null;
            return t.day || 0 === t.day ? e = t.day : t.date && (e = gantt.date.date_part(new Date(t.date)).valueOf()), e
        },
        set_time: function(t) {
            var e = void 0 !== t.hours ? t.hours : !0,
                n = this._timestamp(t);
            null !== n ? this.dates[n] = e : this.hours = e
        },
        unset_time: function(t) {
            if (t) {
                var e = this._timestamp(t);
                null !== e && delete this.dates[e]
            } else this.hours = []
        },
        is_working_unit: function(t, e, n) {
            return gantt.config.work_time ? (void 0 === n && (n = this._get_unit_order(e)), void 0 === n ? !1 : n && !this.is_working_unit(t, this.units[n - 1], n - 1) ? !1 : this["is_work_" + e] ? this["is_work_" + e](t) : !0) : !0
        },
        is_work_day: function(t) {
            var e = this.get_working_hours(t);
            return e instanceof Array ? e.length > 0 : !1
        },
        is_work_hour: function(t) {
            for (var e = this.get_working_hours(t), n = t.getHours(), i = 0; i < e.length; i += 2) {
                if (void 0 === e[i + 1]) return e[i] == n;
                if (n >= e[i] && n < e[i + 1]) return !0
            }
            return !1
        },
        get_working_hours: function(t) {
            var e = this._timestamp({
                    date: t
                }),
                n = !0;
            return void 0 !== this.dates[e] ? n = this.dates[e] : void 0 !== this.dates[t.getDay()] && (n = this.dates[t.getDay()]), n === !0 ? this.hours : n ? n : []
        },
        get_work_units_between: function(t, e, n, i) {
            if (!n) return !1;
            for (var a = new Date(t), s = new Date(e), i = i || 1, r = 0; a.valueOf() < s.valueOf();) this.is_working_unit(a, n) && r++, a = gantt.date.add(a, i, n);
            return r
        },
        add_worktime: function(t, e, n, i) {
            if (!n) return !1;
            for (var a = new Date(t), s = 0, i = i || 1, e = 1 * e; e > s;) {
                var r = gantt.date.add(a, i, n);
                this.is_working_unit(i > 0 ? a : r, n) && s++, a = r
            }
            return a
        },
        get_closest_worktime: function(t) {
            if (this.is_working_unit(t.date, t.unit)) return t.date;
            var e = t.unit,
                n = gantt.date[e + "_start"](t.date),
                i = new Date(n),
                a = new Date(n),
                s = !0,
                r = 3e3,
                o = 0,
                d = "any" == t.dir || !t.dir,
                l = 1;
            for ("past" == t.dir && (l = -1); !this.is_working_unit(n, e);)
                if (d && (n = s ? i : a, l = -1 * l), n = gantt.date.add(n, l, e), d && (s ? i = n : a = n), s = !s, o++, o > r) return dhtmlx.assert(!1, "Invalid working time check"), !1;
            return (n == a || "past" == t.dir) && (n = gantt.date.add(n, 1, e)), n
        }
    }, gantt.getTask = function(t) {
        return dhtmlx.assert(t, "Invalid argument for gantt.getTask"), dhtmlx.assert(this._pull[t], "Task not found id=" + t), this._pull[t]
    }, gantt.getTaskByTime = function(t, e) {
        var n = this._pull,
            i = [];
        if (t || e) {
            t = +t || -1 / 0, e = +e || 1 / 0;
            for (var a in n) {
                var s = n[a]; + s.start_date < e && +s.end_date > t && i.push(s)
            }
        } else
            for (var a in n) i.push(n[a]);
        return i
    }, gantt.isTaskExists = function(t) {
        return dhtmlx.defined(this._pull[t])
    }, gantt.isTaskVisible = function(t) {
        if (!this._pull[t]) return !1;
        if (!(+this._pull[t].start_date < +this._max_date && +this._pull[t].end_date > +this._min_date)) return !1;
        for (var e = 0, n = this._order.length; n > e; e++)
            if (this._order[e] == t) return !0;
        return !1
    }, gantt.updateTask = function(t, e) {
        return dhtmlx.defined(e) || (e = this.getTask(t)), this.callEvent("onBeforeTaskUpdate", [t, e]) === !1 ? !1 : (this._pull[e.id] = e, this._is_parent_sync(e) || this._resync_parent(e), this._update_parents(e.id), this.refreshTask(e.id), this.callEvent("onAfterTaskUpdate", [t, e]), this._sync_order(), void this._adjust_scales())
    }, gantt._add_branch = function(t, e) {
        this._branches[t.parent] || (this._branches[t.parent] = []);
        for (var n = this._branches[t.parent], i = !1, a = 0, s = n.length; s > a; a++)
            if (n[a] == t.id) {
                i = !0;
                break
            }
        i || n.push(t.id), this._sync_parent(t), this._sync_order(e)
    }, gantt._move_branch = function(t, e, n) {
        t.parent = n, this._sync_parent(t), this._replace_branch_child(e, t.id), this.isTaskExists(n) || n == this.config.root_id ? this._add_branch(t) : delete this._branches[t.id], t.$level = this.calculateTaskLevel(t), this._sync_order()
    }, gantt._resync_parent = function(t) {
        this._move_branch(t, t.$rendered_parent, t.parent)
    }, gantt._sync_parent = function(t) {
        t.$rendered_parent = t.parent
    }, gantt._is_parent_sync = function(t) {
        return t.$rendered_parent == t.parent
    }, gantt._replace_branch_child = function(t, e, n) {
        var i = this._branches[t];
        if (i) {
            for (var a = [], s = 0; s < i.length; s++) i[s] != e ? a.push(i[s]) : n && a.push(n);
            this._branches[t] = a
        }
        this._sync_order()
    }, gantt.addTask = function(t, e) {
        return dhtmlx.defined(e) || (e = t.parent || 0), dhtmlx.defined(this._pull[e]) || (e = 0), t.parent = e, t = this._init_task(t), this.callEvent("onBeforeTaskAdd", [t.id, t]) === !1 ? !1 : (this._pull[t.id] = t, this._add_branch(t), this.refreshData(), this._adjust_scales(), this.callEvent("onAfterTaskAdd", [t.id, t]), t.id)
    }, gantt._default_task_date = function(t, e) {
        var n = e && e != this.config.root_id ? this.getTask(e) : !1,
            i = "";
        if (n) i = n.start_date;
        else {
            var a = this._order[0];
            i = a ? this.getTask(a).start_date : this.getState().min_date
        }
        return new Date(i)
    }, gantt._set_default_task_timing = function(t) {
        t.start_date = t.start_date || gantt._default_task_date(t, t.parent), t.duration = t.duration || this.config.duration_step, t.end_date = t.end_date || this.calculateEndDate(t.start_date, t.duration)
    }, gantt.createTask = function(t, e) {
        return t = t || {}, t.id = dhtmlx.uid(), t.start_date || (t.start_date = gantt._default_task_date(t, e)), void 0 === t.text && (t.text = gantt.locale.labels.new_task), void 0 === t.duration && (t.duration = 1), e && (t.parent = e, e = this.getTask(e), e.$open = !0), this.callEvent("onTaskCreated", [t]) ? (this.config.details_on_create ? (t.$new = !0, this._pull[t.id] = this._init_task(t), this._add_branch(t), t.$level = this.calculateTaskLevel(t), this.selectTask(t.id), this.refreshData(), this.showLightbox(t.id)) : this.addTask(t) && (this.showTask(t.id), this.selectTask(t.id)), t.id) : null
    }, gantt.deleteTask = function(t) {
        return this._deleteTask(t)
    }, gantt._getChildLinks = function(t) {
        var e = this.getTask(t);
        if (!e) return [];
        for (var n = e.$source.concat(e.$target), i = this.getChildren(e.id), a = 0; a < i.length; a++) n = n.concat(this._getChildLinks(i[a]));
        for (var s = {}, a = 0; a < n.length; a++) s[n[a]] = !0;
        n = [];
        for (var a in s) n.push(a);
        return n
    }, gantt._getTaskTree = function(t) {
        var e = this.getTask(t);
        if (!e) return [];
        for (var n = [], i = this.getChildren(e.id), a = 0; a < i.length; a++) n.push(i[a]), n = n.concat(this._getTaskTree(i[a]));
        return n
    }, gantt._deleteRelatedLinks = function(t, e) {
        var n = this._dp && !e;
        n && this._dp.setUpdateMode("off");
        for (var i = 0; i < t.length; i++) n && (this._dp.setGanttMode("links"), this._dp.setUpdated(t[i], !0, "deleted")), this._deleteLink(t[i], !0);
        n && (this._dp.sendData(), this._dp.setUpdateMode("cell"))
    }, gantt._deleteRelatedTasks = function(t, e) {
        var n = this._dp && !e;
        n && (this._dp.setGanttMode("tasks"), this._dp.setUpdateMode("off"));
        for (var i = this._getTaskTree(t), a = 0; a < i.length; a++) {
            var s = i[a];
            this._unset_task(s), n && this._dp.setUpdated(s, !0, "deleted")
        }
        n && this._dp.setUpdateMode("cell")
    }, gantt._unset_task = function(t) {
        var e = this.getTask(t);
        this._update_flags(t, null), delete this._pull[t], this._move_branch(e, e.parent, null)
    }, gantt._deleteTask = function(t, e) {
        var n = this.getTask(t);
        if (!e && this.callEvent("onBeforeTaskDelete", [t, n]) === !1) return !1;
        var i = gantt._getChildLinks(t);
        return this._deleteRelatedTasks(t, e), this._deleteRelatedLinks(i, e), this._unset_task(t), e || (this.callEvent("onAfterTaskDelete", [t, n]), this.refreshData()), !0
    }, gantt.clearAll = function() {
        this._pull = {}, this._branches = {}, this._order = [], this._order_full = [], this._lpull = {}, this._update_flags(), this.userdata = {}, this.callEvent("onClear", []), this.refreshData()
    }, gantt._update_flags = function(t, e) {
        void 0 === t ? (this._lightbox_id = this._selected_task = null, this._tasks_dnd.drag && (this._tasks_dnd.drag.id = null)) : (this._lightbox_id == t && (this._lightbox_id = e), this._selected_task == t && (this._selected_task = e), this._tasks_dnd.drag && this._tasks_dnd.drag.id == t && (this._tasks_dnd.drag.id = e))
    }, gantt.changeTaskId = function(t, e) {
        var n = this._pull[e] = this._pull[t];
        this._pull[e].id = e, delete this._pull[t];
        for (var i in this._pull) this._pull[i].parent == t && (this._pull[i].parent = e);
        this._update_flags(t, e), this._replace_branch_child(n.parent, t, e), this.callEvent("onTaskIdChange", [t, e])
    }, gantt._get_duration_unit = function() {
        return 1e3 * gantt._get_line(this.config.duration_unit) || this.config.duration_unit
    }, gantt._get_safe_type = function() {
        return "task"
    }, gantt._get_type_name = function(t) {
        for (var e in this.config.types)
            if (this.config.types[e] == t) return e;
        return "task"
    }, gantt.getWorkHours = function(t) {
        return this._working_time_helper.get_working_hours(t)
    }, gantt.setWorkTime = function(t) {
        this._working_time_helper.set_time(t)
    }, gantt.isWorkTime = function(t, e) {
        var n = this._working_time_helper;
        return n.is_working_unit(t, e || this.config.duration_unit)
    }, gantt.correctTaskWorkTime = function(t) {
        gantt.config.work_time && gantt.config.correct_work_time && (gantt.isWorkTime(t.start_date) ? gantt.isWorkTime(new Date(+t.end_date - 1)) || (t.end_date = gantt.calculateEndDate(t.start_date, t.duration)) : (t.start_date = gantt.getClosestWorkTime({
            date: t.start_date,
            dir: "future"
        }), t.end_date = gantt.calculateEndDate(t.start_date, t.duration)))
    }, gantt.getClosestWorkTime = function(t) {
        var e = this._working_time_helper;
        return t instanceof Date && (t = {
            date: t
        }), t.dir = t.dir || "any", t.unit = t.unit || this.config.duration_unit, e.get_closest_worktime(t)
    }, gantt.calculateDuration = function(t, e) {
        var n = this._working_time_helper;
        return n.get_work_units_between(t, e, this.config.duration_unit, this.config.duration_step)
    }, gantt.calculateEndDate = function(t, e, n) {
        var i = this._working_time_helper,
            a = e >= 0 ? 1 : -1;
        return i.add_worktime(t, Math.abs(e), n || this.config.duration_unit, a * this.config.duration_step)
    }, gantt._init_task = function(t) {
        return dhtmlx.defined(t.id) || (t.id = dhtmlx.uid()), t.start_date && (t.start_date = gantt.date.parseDate(t.start_date, "xml_date")), t.end_date && (t.end_date = gantt.date.parseDate(t.end_date, "xml_date")), t.start_date && !t.end_date && t.duration && (t.end_date = this.calculateEndDate(t.start_date, t.duration)), gantt._init_task_timing(t), t.start_date && t.end_date && gantt.correctTaskWorkTime(t), t.$source = [], t.$target = [], t.parent = t.parent || this.config.root_id, t.$open = dhtmlx.defined(t.open) ? t.open : this.config.open_tree_initially, t.$level = this.calculateTaskLevel(t), t
    }, gantt._init_task_timing = function(t) {
        var e = this._get_safe_type(t.type);
        void 0 === t.$rendered_type ? t.$rendered_type = e : t.$rendered_type != e && (delete t.$no_end, delete t.$no_start, t.$rendered_type = e), void 0 !== t.$no_end && void 0 !== t.$no_start || e == this.config.types.milestone || (e == this.config.types.project ? (t.$no_end = t.$no_start = !0, this._set_default_task_timing(t)) : (t.$no_end = !(t.end_date || t.duration), t.$no_start = !t.start_date)), e == this.config.types.milestone && (t.end_date = t.start_date), t.start_date && t.end_date && (t.duration = this.calculateDuration(t.start_date, t.end_date)), t.duration = t.duration || 0
    }, gantt._is_flex_task = function(t) {
        return !(!t.$no_end && !t.$no_start)
    }, gantt.resetProjectDates = function(t) {
        if (t.$no_end || t.$no_start) {
            var e = this.getSubtaskDates(t.id);
            this._assign_project_dates(t, e.start_date, e.end_date)
        }
    }, gantt.getSubtaskDates = function(t) {
        var e = null,
            n = null,
            i = void 0 !== t ? t : gantt.config.root_id;
        return this.eachTask(function(t) {
            this._get_safe_type(t.type) != gantt.config.types.project && (t.start_date && !t.$no_start && (!e || e > t.start_date.valueOf()) && (e = t.start_date.valueOf()), t.end_date && !t.$no_end && (!n || n < t.end_date.valueOf()) && (n = t.end_date.valueOf()))
        }, i), {
            start_date: e ? new Date(e) : null,
            end_date: n ? new Date(n) : null
        }
    }, gantt._assign_project_dates = function(t, e, n) {
        t.$no_start && (t.start_date = e && 1 / 0 != e ? new Date(e) : this._default_task_date(t, t.parent)), t.$no_end && (t.end_date = n && n != -1 / 0 ? new Date(n) : this.calculateEndDate(t.start_date, this.config.duration_step)), (t.$no_start || t.$no_end) && this._init_task_timing(t)
    }, gantt._update_parents = function(t, e) {
        if (t) {
            for (var n = this.getTask(t); !n.$no_end && !n.$no_start && n.parent && this.isTaskExists(n.parent);) n = this.getTask(n.parent);
            (n.$no_start || n.$no_end) && (gantt.resetProjectDates(n), e || this.refreshTask(n.id, !0)), n.parent && this.isTaskExists(n.parent) && this._update_parents(n.parent, e)
        }
    }, gantt.isChildOf = function(t, e) {
        if (!this.isTaskExists(t)) return !1;
        if (e === this.config.root_id) return this.isTaskExists(t);
        for (var n = this.getTask(t); n && this.isTaskExists(n.parent);)
            if (n = this.getTask(n.parent), n && n.id == e) return !0;
        return !1
    }, gantt.roundDate = function(t) {
        t instanceof Date && (t = {
            date: t,
            unit: gantt._tasks.unit,
            step: gantt._tasks.step
        });
        for (var e = t.date, n = t.step, i = t.unit, a = gantt.date[i + "_start"](new Date(this._min_date)); + e > +a;) a = gantt.date.add(a, n, i);
        var s = gantt.date.add(a, -1 * n, i);
        return t.dir && "future" == t.dir ? a : t.dir && "past" == t.dir ? s : Math.abs(e - s) < Math.abs(a - e) ? s : a
    }, gantt.attachEvent("onBeforeTaskUpdate", function(t, e) {
        return gantt._init_task_timing(e), !0
    }), gantt.attachEvent("onBeforeTaskAdd", function(t, e) {
        return gantt._init_task_timing(e), !0
    }), gantt.calculateTaskLevel = function(t) {
        for (var e = 0; t.parent && dhtmlx.defined(this._pull[t.parent]);) t = this._pull[t.parent], e++;
        return e
    }, gantt.sort = function(t, e, n) {
        var i = !arguments[3];
        dhtmlx.defined(n) || (n = this.config.root_id), dhtmlx.defined(t) || (t = "order");
        var a = "string" == typeof t ? function(n, i) {
                if (n[t] == i[t]) return 0;
                var a = n[t] > i[t];
                return e && (a = !a), a ? 1 : -1
            } : t,
            s = this._branches[n];
        if (s) {
            for (var r = [], o = s.length - 1; o >= 0; o--) r[o] = this._pull[s[o]];
            r.sort(a);
            for (var o = 0; o < r.length; o++) s[o] = r[o].id, this.sort(t, e, s[o], !0)
        }
        i && this.refreshData()
    }, gantt.getNext = function(t) {
        for (var e = 0; e < this._order.length - 1; e++)
            if (this._order[e] == t) return this._order[e + 1];
        return null
    }, gantt.getPrev = function(t) {
        for (var e = 1; e < this._order.length; e++)
            if (this._order[e] == t) return this._order[e - 1];
        return null
    }, gantt.getParent = function(t) {
        var e = this.config.root_id;
        if (this.isTaskExists(t)) {
            var n = gantt.getTask(t);
            e = n.parent
        }
        return e
    }, gantt.getSiblings = function(t) {
        var e = this.getParent(t);
        return this._branches[e] || []
    }, gantt.getNextSibling = function(t) {
        for (var e = this.getSiblings(t), n = 0, i = e.length; i > n; n++)
            if (e[n] == t) return e[n + 1] || null;
        return null
    }, gantt.getPrevSibling = function(t) {
        for (var e = this.getSiblings(t), n = 0, i = e.length; i > n; n++)
            if (e[n] == t) return e[n - 1] || null;
        return null
    }, gantt._dp_init = function(t) {
        t.setTransactionMode("POST", !0), t.serverProcessor += (-1 != t.serverProcessor.indexOf("?") ? "&" : "?") + "editing=true", t._serverProcessor = t.serverProcessor, t.styles = {
            updated: "gantt_updated",
            inserted: "gantt_inserted",
            deleted: "gantt_deleted",
            invalid: "gantt_invalid",
            error: "gantt_error",
            clear: ""
        }, t._methods = ["_row_style", "setCellTextStyle", "_change_id", "_delete_task"], t.setGanttMode = function(e) {
            var n = t.modes || {};
            t._ganttMode && (n[t._ganttMode] = {
                _in_progress: t._in_progress,
                _invalid: t._invalid,
                updatedRows: t.updatedRows
            });
            var i = n[e];
            i || (i = n[e] = {
                _in_progress: {},
                _invalid: {},
                updatedRows: []
            }), t._in_progress = i._in_progress, t._invalid = i._invalid, t.updatedRows = i.updatedRows, t.modes = n, t._ganttMode = e
        }, this._sendTaskOrder = function(e, n) {
            n.$drop_target && (t.setGanttMode("tasks"), this.getTask(e).target = n.$drop_target, t.setUpdated(e, !0, "order"), delete this.getTask(e).$drop_target)
        }, this.attachEvent("onAfterTaskAdd", function(e) {
            t.setGanttMode("tasks"), t.setUpdated(e, !0, "inserted")
        }), this.attachEvent("onAfterTaskUpdate", function(e, n) {
            t.setGanttMode("tasks"), t.setUpdated(e, !0), gantt._sendTaskOrder(e, n)
        }), this.attachEvent("onAfterTaskDelete", function(e) {
            t.setGanttMode("tasks"), t.setUpdated(e, !0, "deleted")
        }), this.attachEvent("onAfterLinkUpdate", function(e) {
            t.setGanttMode("links"), t.setUpdated(e, !0)
        }), this.attachEvent("onAfterLinkAdd", function(e) {
            t.setGanttMode("links"), t.setUpdated(e, !0, "inserted")
        }), this.attachEvent("onAfterLinkDelete", function(e) {
            t.setGanttMode("links"), t.setUpdated(e, !0, "deleted")
        }), this.attachEvent("onRowDragEnd", function(t) {
            gantt._sendTaskOrder(t, gantt.getTask(t))
        }), t.attachEvent("onBeforeDataSending", function() {
            return this.serverProcessor = this._serverProcessor + getUrlSymbol(this._serverProcessor) + "gantt_mode=" + this._ganttMode, !0
        });
        var e = t.afterUpdate;
        t.afterUpdate = function(n, i, a, s, r) {
            var o = t._ganttMode;
            t.setGanttMode(r.filePath && -1 != r.filePath.indexOf("gantt_mode=links") ? "links" : "tasks");
            var d = e.apply(t, arguments);
            return t.setGanttMode(o), d
        }, t._getRowData = dhtmlx.bind(function(e) {
            var n;
            n = "tasks" == t._ganttMode ? this.isTaskExists(e) ? this.getTask(e) : {
                id: e
            } : this.isLinkExists(e) ? this.getLink(e) : {
                id: e
            }, n = dhtmlx.copy(n);
            var i = {};
            for (var a in n)
                if ("$" != a.substr(0, 1)) {
                    var s = n[a];
                    i[a] = s instanceof Date ? this.templates.xml_format(s) : null === s ? "" : s
                }
            return n.$no_start && (n.start_date = "", n.duration = ""), n.$no_end && (n.end_date = "", n.duration = ""), i[t.action_param] = this.getUserData(e, t.action_param), i
        }, this), this._change_id = dhtmlx.bind(function(e, n) {
            "tasks" != t._ganttMode ? this.changeLinkId(e, n) : this.changeTaskId(e, n)
        }, this), this._row_style = function(e, n) {
            if ("tasks" == t._ganttMode) {
                var i = gantt.getTaskRowNode(e);
                if (i)
                    if (n) i.className += " " + n;
                    else {
                        var a = / (gantt_updated|gantt_inserted|gantt_deleted|gantt_invalid|gantt_error)/g;
                        i.className = i.className.replace(a, "")
                    }
            }
        }, this._delete_task = function() {}, this._dp = t
    }, gantt.getUserData = function(t, e) {
        return this.userdata || (this.userdata = {}), this.userdata[t] && this.userdata[t][e] ? this.userdata[t][e] : ""
    }, gantt.setUserData = function(t, e, n) {
        this.userdata || (this.userdata = {}), this.userdata[t] || (this.userdata[t] = {}), this.userdata[t][e] = n
    }, gantt._init_link = function(t) {
        return dhtmlx.defined(t.id) || (t.id = dhtmlx.uid()), t
    }, gantt._sync_links = function() {
        for (var t in this._pull) this._pull[t].$source = [], this._pull[t].$target = [];
        for (var t in this._lpull) {
            var e = this._lpull[t];
            this._pull[e.source] && this._pull[e.source].$source.push(t), this._pull[e.target] && this._pull[e.target].$target.push(t)
        }
    }, gantt.getLink = function(t) {
        return dhtmlx.assert(this._lpull[t], "Link doesn't exist"), this._lpull[t]
    }, gantt.isLinkExists = function(t) {
        return dhtmlx.defined(this._lpull[t])
    }, gantt.addLink = function(t) {
        return t = this._init_link(t), this.callEvent("onBeforeLinkAdd", [t.id, t]) === !1 ? !1 : (this._lpull[t.id] = t, this._sync_links(), this._render_link(t.id), this.callEvent("onAfterLinkAdd", [t.id, t]), t.id)
    }, gantt.updateLink = function(t, e) {
        return dhtmlx.defined(e) || (e = this.getLink(t)), this.callEvent("onBeforeLinkUpdate", [t, e]) === !1 ? !1 : (this._lpull[t] = e, this._sync_links(), this._render_link(t), this.callEvent("onAfterLinkUpdate", [t, e]), !0)
    }, gantt.deleteLink = function(t) {
        return this._deleteLink(t)
    }, gantt._deleteLink = function(t, e) {
        var n = this.getLink(t);
        return e || this.callEvent("onBeforeLinkDelete", [t, n]) !== !1 ? (delete this._lpull[t], this._sync_links(), this.refreshLink(t), e || this.callEvent("onAfterLinkDelete", [t, n]), !0) : !1
    }, gantt.changeLinkId = function(t, e) {
        this._lpull[e] = this._lpull[t], this._lpull[e].id = e, delete this._lpull[t], this._sync_links(), this.callEvent("onLinkIdChange", [t, e])
    }, gantt.getChildren = function(t) {
        return dhtmlx.defined(this._branches[t]) ? this._branches[t] : []
    }, gantt.hasChild = function(t) {
        return dhtmlx.defined(this._branches[t]) && this._branches[t].length
    }, gantt.refreshData = function() {
        this._render_data()
    }, gantt._configure = function(t, e) {
        for (var n in e) "undefined" == typeof t[n] && (t[n] = e[n])
    }, gantt._init_skin = function() {
        if (!gantt.skin)
            for (var t = document.getElementsByTagName("link"), e = 0; e < t.length; e++) {
                var n = t[e].href.match("dhtmlxgantt_([a-z]+).css");
                if (n) {
                    gantt.skin = n[1];
                    break
                }
            }
        gantt.skin || (gantt.skin = "terrace");
        var i = gantt.skins[gantt.skin];
        this._configure(gantt.config, i.config);
        var a = gantt.getGridColumns();
        a[1] && "undefined" == typeof a[1].width && (a[1].width = i._second_column_width), a[2] && "undefined" == typeof a[2].width && (a[2].width = i._third_column_width), i._lightbox_template && (gantt._lightbox_template = i._lightbox_template), gantt._init_skin = function() {}
    }, gantt.skins = {}, gantt._lightbox_methods = {}, gantt._lightbox_template = "<div class='gantt_cal_ltitle'><span class='gantt_mark'>&nbsp;</span><span class='gantt_time'></span><span class='gantt_title'></span></div><div class='gantt_cal_larea'></div>", gantt.showLightbox = function(t) {
        if (t && !gantt._is_readonly(this.getTask(t)) && this.callEvent("onBeforeLightbox", [t])) {
            var e = this.getTask(t),
                n = this.getLightbox(this._get_safe_type(e.type));
            this._center_lightbox(n), this.showCover(), this._fill_lightbox(t, n), this.callEvent("onLightbox", [t])
        }
    }, gantt._get_timepicker_step = function() {
        if (this.config.round_dnd_dates) {
            var t = gantt._tasks,
                e = this._get_line(t.unit) * t.step / 60;
            return (e >= 1440 || !this._is_chart_visible()) && (e = this.config.time_step), e
        }
        return this.config.time_step
    }, gantt.getLabel = function(t, e) {
        for (var n = this._get_typed_lightbox_config(), i = 0; i < n.length; i++)
            if (n[i].map_to == t)
                for (var a = n[i].options, s = 0; s < a.length; s++)
                    if (a[s].key == e) return a[s].label;
        return ""
    }, gantt.updateCollection = function(t, e) {
        e = e.slice(0);
        var n = gantt.serverList(t);
        return n ? (n.splice(0, n.length), n.push.apply(n, e || []), void gantt.resetLightbox()) : !1
    }, gantt.getLightboxType = function() {
        return this._get_safe_type(this._lightbox_type)
    }, gantt.getLightbox = function(t) {
        if (void 0 === t && (t = this.getLightboxType()), !this._lightbox || this.getLightboxType() != this._get_safe_type(t)) {
            this._lightbox_type = this._get_safe_type(t);
            var e = document.createElement("DIV");
            e.className = "gantt_cal_light";
            var n = this._is_lightbox_timepicker();
            (gantt.config.wide_form || n) && (e.className += " gantt_cal_light_wide"), n && (gantt.config.wide_form = !0, e.className += " gantt_cal_light_full"), e.style.visibility = "hidden";
            for (var i = this._lightbox_template, a = this.config.buttons_left, s = 0; s < a.length; s++) {
                var r = this.config._migrate_buttons[a[s]] ? this.config._migrate_buttons[a[s]] : a[s];
                i += "<div class='gantt_btn_set gantt_left_btn_set " + r + "_set'><div dhx_button='1' class='" + r + "'></div><div>" + this.locale.labels[r] + "</div></div>"
            }
            a = this.config.buttons_right;
            for (var s = 0; s < a.length; s++) {
                var r = this.config._migrate_buttons[a[s]] ? this.config._migrate_buttons[a[s]] : a[s];
                i += "<div class='gantt_btn_set gantt_right_btn_set " + r + "_set' style='float:right;'><div dhx_button='1' class='" + r + "'></div><div>" + this.locale.labels[r] + "</div></div>"
            }
            i += "</div>", e.innerHTML = i, gantt.config.drag_lightbox && (e.firstChild.onmousedown = gantt._ready_to_dnd, e.firstChild.onselectstart = function() {
                return !1
            }, e.firstChild.style.cursor = "pointer", gantt._init_dnd_events()), document.body.insertBefore(e, document.body.firstChild), this._lightbox = e;
            var o = this._get_typed_lightbox_config(t);
            i = this._render_sections(o);
            for (var d = e.getElementsByTagName("div"), s = 0; s < d.length; s++) {
                var l = d[s];
                if ("gantt_cal_larea" == l.className) {
                    l.innerHTML = i;
                    break
                }
            }
            this.resizeLightbox(), this._init_lightbox_events(this), e.style.display = "none", e.style.visibility = "visible"
        }
        return this._lightbox
    }, gantt._render_sections = function(t) {
        for (var e = "", n = 0; n < t.length; n++) {
            var i = this.form_blocks[t[n].type];
            if (i) {
                t[n].id = "area_" + dhtmlx.uid();
                var a = t[n].hidden ? " style='display:none'" : "",
                    s = "";
                t[n].button && (s = "<div class='gantt_custom_button' index='" + n + "'><div class='gantt_custom_button_" + t[n].button + "'></div><div>" + this.locale.labels["button_" + t[n].button] + "</div></div>"), this.config.wide_form && (e += "<div class='gantt_wrap_section' " + a + ">"), e += "<div id='" + t[n].id + "' class='gantt_cal_lsection'>" + s + this.locale.labels["section_" + t[n].name] + "</div>" + i.render.call(this, t[n]), e += "</div>"
            }
        }
        return e
    }, gantt.resizeLightbox = function() {
        var t = this._lightbox;
        if (t) {
            var e = t.childNodes[1];
            e.style.height = "0px", e.style.height = e.scrollHeight + "px", t.style.height = e.scrollHeight + this.config.lightbox_additional_height + "px", e.style.height = e.scrollHeight + "px"
        }
    }, gantt._center_lightbox = function(t) {
        if (t) {
            t.style.display = "block";
            var e = window.pageYOffset || document.body.scrollTop || document.documentElement.scrollTop,
                n = window.pageXOffset || document.body.scrollLeft || document.documentElement.scrollLeft,
                i = window.innerHeight || document.documentElement.clientHeight;
            t.style.top = e ? Math.round(e + Math.max((i - t.offsetHeight) / 2, 0)) + "px" : Math.round(Math.max((i - t.offsetHeight) / 2, 0) + 9) + "px", t.style.left = document.documentElement.scrollWidth > document.body.offsetWidth ? Math.round(n + (document.body.offsetWidth - t.offsetWidth) / 2) + "px" : Math.round((document.body.offsetWidth - t.offsetWidth) / 2) + "px"
        }
    }, gantt.showCover = function() {
        if (!this._cover) {
            this._cover = document.createElement("DIV"), this._cover.className = "gantt_cal_cover";
            var t = void 0 !== document.height ? document.height : document.body.offsetHeight,
                e = document.documentElement ? document.documentElement.scrollHeight : 0;
            this._cover.style.height = Math.max(t, e) + "px", document.body.appendChild(this._cover)
        }
    }, gantt._init_lightbox_events = function() {
        gantt.lightbox_events = {}, gantt.lightbox_events.gantt_save_btn = function() {
            gantt._save_lightbox()
        }, gantt.lightbox_events.gantt_delete_btn = function() {
            gantt.callEvent("onLightboxDelete", [gantt._lightbox_id]) && (gantt.isTaskExists(gantt._lightbox_id) ? gantt.$click.buttons["delete"](gantt._lightbox_id) : gantt.hideLightbox())
        }, gantt.lightbox_events.gantt_cancel_btn = function() {
            gantt._cancel_lightbox()
        }, gantt.lightbox_events["default"] = function(t, e) {
            if (e.getAttribute("dhx_button")) gantt.callEvent("onLightboxButton", [e.className, e, t]);
            else {
                var n, i, a; - 1 != e.className.indexOf("gantt_custom_button") && (-1 != e.className.indexOf("gantt_custom_button_") ? (n = e.parentNode.getAttribute("index"), a = e.parentNode.parentNode) : (n = e.getAttribute("index"), a = e.parentNode, e = e.firstChild));
                var s = gantt._get_typed_lightbox_config();
                n && (i = gantt.form_blocks[s[n].type], i.button_click(n, e, a, a.nextSibling))
            }
        }, dhtmlxEvent(gantt.getLightbox(), "click", function(t) {
            t = t || window.event;
            var e = t.target ? t.target : t.srcElement;
            if (e.className || (e = e.previousSibling), e && e.className && 0 === e.className.indexOf("gantt_btn_set") && (e = e.firstChild), e && e.className) {
                var n = dhtmlx.defined(gantt.lightbox_events[e.className]) ? gantt.lightbox_events[e.className] : gantt.lightbox_events["default"];
                return n(t, e)
            }
            return !1
        }), gantt.getLightbox().onkeydown = function(t) {
            switch ((t || event).keyCode) {
                case gantt.keys.edit_save:
                    if ((t || event).shiftKey) return;
                    gantt._save_lightbox();
                    break;
                case gantt.keys.edit_cancel:
                    gantt._cancel_lightbox()
            }
        }
    }, gantt._cancel_lightbox = function() {
        var t = this.getLightboxValues();
        this.callEvent("onLightboxCancel", [this._lightbox_id, t.$new]), gantt.isTaskExists(t.id) && t.$new && this._deleteTask(t.id, !0), this.refreshData(), this.hideLightbox()
    }, gantt._save_lightbox = function() {
        var t = this.getLightboxValues();
        this.callEvent("onLightboxSave", [this._lightbox_id, t, !!t.$new]) && (t.$new ? (delete t.$new, this.addTask(t)) : this.isTaskExists(t.id) && (dhtmlx.mixin(this.getTask(t.id), t, !0), this.updateTask(t.id)), this.refreshData(), this.hideLightbox())
    }, gantt._resolve_default_mapping = function(t) {
        var e = t.map_to,
            n = {
                time: !0,
                duration: !0
            };
        return n[t.type] && ("auto" == t.map_to ? e = {
            start_date: "start_date",
            end_date: "end_date",
            duration: "duration"
        } : "string" == typeof t.map_to && (e = {
            start_date: t.map_to
        })), e
    }, gantt.getLightboxValues = function() {
        var t = {};
        gantt.isTaskExists(this._lightbox_id) && (t = dhtmlx.mixin({}, this.getTask(this._lightbox_id)));
        for (var e = this._get_typed_lightbox_config(), n = 0; n < e.length; n++) {
            var i = document.getElementById(e[n].id);
            i = i ? i.nextSibling : i;
            var a = this.form_blocks[e[n].type];
            if (a) {
                var s = a.get_value.call(this, i, t, e[n]),
                    r = gantt._resolve_default_mapping(e[n]);
                if ("string" == typeof r && "auto" != r) t[r] = s;
                else if ("object" == typeof r)
                    for (var o in r) r[o] && (t[r[o]] = s[o])
            }
        }
        return t
    }, gantt.hideLightbox = function() {
        var t = this.getLightbox();
        t && (t.style.display = "none"), this._lightbox_id = null, this.hideCover(), this.callEvent("onAfterLightbox", [])
    }, gantt.hideCover = function() {
        this._cover && this._cover.parentNode.removeChild(this._cover), this._cover = null
    }, gantt.resetLightbox = function() {
        gantt._lightbox && !gantt._custom_lightbox && gantt._lightbox.parentNode.removeChild(gantt._lightbox), gantt._lightbox = null
    }, gantt._set_lightbox_values = function(t, e) {
        var n = t,
            i = e.getElementsByTagName("span");
        gantt.templates.lightbox_header ? (i[1].innerHTML = "", i[2].innerHTML = gantt.templates.lightbox_header(n.start_date, n.end_date, n)) : (i[1].innerHTML = this.templates.task_time(n.start_date, n.end_date, n), i[2].innerHTML = (this.templates.task_text(n.start_date, n.end_date, n) || "").substr(0, 70));
        for (var a = this._get_typed_lightbox_config(this.getLightboxType()), s = 0; s < a.length; s++) {
            var r = a[s];
            if (this.form_blocks[r.type]) {
                var o = document.getElementById(r.id).nextSibling,
                    d = this.form_blocks[r.type],
                    l = gantt._resolve_default_mapping(a[s]),
                    _ = dhtmlx.defined(n[l]) ? n[l] : r.default_value;
                d.set_value.call(gantt, o, _, n, r), r.focus && d.focus.call(gantt, o)
            }
        }
        t.id && (gantt._lightbox_id = t.id)
    }, gantt._fill_lightbox = function(t, e) {
        var n = this.getTask(t);
        this._set_lightbox_values(n, e)
    }, gantt.getLightboxSection = function(t) {
        var e = this._get_typed_lightbox_config(),
            n = 0;
        for (n; n < e.length && e[n].name != t; n++);
        var i = e[n];
        this._lightbox || this.getLightbox();
        var a = document.getElementById(i.id),
            s = a.nextSibling,
            r = {
                section: i,
                header: a,
                node: s,
                getValue: function(t) {
                    return gantt.form_blocks[i.type].get_value.call(gantt, s, t || {}, i)
                },
                setValue: function(t, e) {
                    return gantt.form_blocks[i.type].set_value.call(gantt, s, t, e || {}, i)
                }
            },
            o = this._lightbox_methods["get_" + i.type + "_control"];
        return o ? o(r) : r
    }, gantt._lightbox_methods.get_template_control = function(t) {
        return t.control = t.node, t
    }, gantt._lightbox_methods.get_select_control = function(t) {
        return t.control = t.node.getElementsByTagName("select")[0], t
    }, gantt._lightbox_methods.get_textarea_control = function(t) {
        return t.control = t.node.getElementsByTagName("textarea")[0], t
    }, gantt._lightbox_methods.get_time_control = function(t) {
        return t.control = t.node.getElementsByTagName("select"), t
    }, gantt._init_dnd_events = function() {
        dhtmlxEvent(document.body, "mousemove", gantt._move_while_dnd), dhtmlxEvent(document.body, "mouseup", gantt._finish_dnd), gantt._init_dnd_events = function() {}
    }, gantt._move_while_dnd = function(t) {
        if (gantt._dnd_start_lb) {
            document.gantt_unselectable || (document.body.className += " gantt_unselectable", document.gantt_unselectable = !0);
            var e = gantt.getLightbox(),
                n = t && t.target ? [t.pageX, t.pageY] : [event.clientX, event.clientY];
            e.style.top = gantt._lb_start[1] + n[1] - gantt._dnd_start_lb[1] + "px", e.style.left = gantt._lb_start[0] + n[0] - gantt._dnd_start_lb[0] + "px"
        }
    }, gantt._ready_to_dnd = function(t) {
        var e = gantt.getLightbox();
        gantt._lb_start = [parseInt(e.style.left, 10), parseInt(e.style.top, 10)], gantt._dnd_start_lb = t && t.target ? [t.pageX, t.pageY] : [event.clientX, event.clientY]
    }, gantt._finish_dnd = function() {
        gantt._lb_start && (gantt._lb_start = gantt._dnd_start_lb = !1, document.body.className = document.body.className.replace(" gantt_unselectable", ""), document.gantt_unselectable = !1)
    }, gantt._focus = function(t, e) {
        if (t && t.focus)
            if (gantt.config.touch);
            else try {
                e && t.select && t.select(), t.focus()
            } catch (n) {}
    }, gantt.form_blocks = {
        getTimePicker: function(t, e) {
            var n = t.time_format;
            if (!n) {
                var n = ["%d", "%m", "%Y"];
                gantt._get_line(gantt._tasks.unit) < gantt._get_line("day") && n.push("%H:%i")
            }
            t._time_format_order = {
                size: 0
            };
            var i = this.config,
                a = this.date.date_part(new Date(gantt._min_date.valueOf())),
                s = 1440,
                r = 0;
            gantt.config.limit_time_select && (s = 60 * i.last_hour + 1, r = 60 * i.first_hour, a.setHours(i.first_hour));
            for (var o = "", d = 0; d < n.length; d++) {
                var l = n[d];
                d > 0 && (o += " ");
                var _ = "";
                switch (l) {
                    case "%Y":
                        t._time_format_order[2] = d, t._time_format_order.size++;
                        for (var h = a.getFullYear() - 5, g = 0; 10 > g; g++) _ += "<option value='" + (h + g) + "'>" + (h + g) + "</option>";
                        break;
                    case "%m":
                        t._time_format_order[1] = d, t._time_format_order.size++;
                        for (var g = 0; 12 > g; g++) _ += "<option value='" + g + "'>" + this.locale.date.month_full[g] + "</option>";
                        break;
                    case "%d":
                        t._time_format_order[0] = d, t._time_format_order.size++;
                        for (var g = 1; 32 > g; g++) _ += "<option value='" + g + "'>" + g + "</option>";
                        break;
                    case "%H:%i":
                        t._time_format_order[3] = d, t._time_format_order.size++;
                        var g = r,
                            c = a.getDate();
                        for (t._time_values = []; s > g;) {
                            var u = this.templates.time_picker(a);
                            _ += "<option value='" + g + "'>" + u + "</option>", t._time_values.push(g), a.setTime(a.valueOf() + 60 * this._get_timepicker_step() * 1e3);
                            var f = a.getDate() != c ? 1 : 0;
                            g = 24 * f * 60 + 60 * a.getHours() + a.getMinutes()
                        }
                }
                if (_) {
                    var p = t.readonly ? "disabled='disabled'" : "",
                        m = e ? " style='display:none'" : "";
                    o += "<select " + p + m + ">" + _ + "</select>"
                }
            }
            return o
        },
        _fill_lightbox_select: function(t, e, n, i) {
            if (t[e + i[0]].value = n.getDate(), t[e + i[1]].value = n.getMonth(), t[e + i[2]].value = n.getFullYear(), dhtmlx.defined(i[3])) {
                var a = 60 * n.getHours() + n.getMinutes();
                a = Math.round(a / gantt._get_timepicker_step()) * gantt._get_timepicker_step();
                var s = t[e + i[3]];
                s.value = a, s.setAttribute("data-value", a)
            }
        },
        template: {
            render: function(t) {
                var e = (t.height || "30") + "px";
                return "<div class='gantt_cal_ltext gantt_cal_template' style='height:" + e + ";'></div>"
            },
            set_value: function(t, e) {
                t.innerHTML = e || ""
            },
            get_value: function(t) {
                return t.innerHTML || ""
            },
            focus: function() {}
        },
        textarea: {
            render: function(t) {
                var e = (t.height || "130") + "px";
                return "<div class='gantt_cal_ltext' style='height:" + e + ";'><textarea></textarea></div>"
            },
            set_value: function(t, e) {
                t.firstChild.value = e || ""
            },
            get_value: function(t) {
                return t.firstChild.value
            },
            focus: function(t) {
                var e = t.firstChild;
                gantt._focus(e, !0)
            }
        },
        select: {
            render: function(t) {
                for (var e = (t.height || "23") + "px", n = "<div class='gantt_cal_ltext' style='height:" + e + ";'><select style='width:100%;'>", i = 0; i < t.options.length; i++) n += "<option value='" + t.options[i].key + "'>" + t.options[i].label + "</option>";
                return n += "</select></div>"
            },
            set_value: function(t, e, n, i) {
                var a = t.firstChild;
                !a._dhx_onchange && i.onchange && (a.onchange = i.onchange, a._dhx_onchange = !0), "undefined" == typeof e && (e = (a.options[0] || {}).value), a.value = e || ""
            },
            get_value: function(t) {
                return t.firstChild.value
            },
            focus: function(t) {
                var e = t.firstChild;
                gantt._focus(e, !0)
            }
        },
        time: {
            render: function(t) {
                var e = this.form_blocks.getTimePicker.call(this, t),
                    n = ["<div style='height:30px;padding-top:0px;font-size:inherit;text-align:center;' class='gantt_section_time'>"];
                return n.push(e), t.single_date ? (e = this.form_blocks.getTimePicker.call(this, t, !0), n.push("<span></span>")) : n.push("<span style='font-weight:normal; font-size:10pt;'> &nbsp;&ndash;&nbsp; </span>"), n.push(e), n.push("</div>"), n.join("")
            },
            set_value: function(t, e, n, i) {
                {
                    var a = i,
                        s = t.getElementsByTagName("select"),
                        r = i._time_format_order;
                    i._time_format_size
                }
                if (a.auto_end_date)
                    for (var o = function() {
                            _ = new Date(s[r[2]].value, s[r[1]].value, s[r[0]].value, 0, 0), h = gantt.calculateEndDate(_, 1), this.form_blocks._fill_lightbox_select(s, r.size, h, r, a)
                        }, d = 0; 4 > d; d++) s[d].onchange = o;
                var l = gantt._resolve_default_mapping(i);
                "string" == typeof l && (l = {
                    start_date: l
                });
                var _ = n[l.start_date] || new Date,
                    h = n[l.end_date] || gantt.calculateEndDate(_, 1);
                this.form_blocks._fill_lightbox_select(s, 0, _, r, a), this.form_blocks._fill_lightbox_select(s, r.size, h, r, a)
            },
            get_value: function(t, e, n) {
                var i = t.getElementsByTagName("select"),
                    a = n._time_format_order,
                    s = 0,
                    r = 0;
                if (dhtmlx.defined(a[3])) {
                    var o = parseInt(i[a[3]].value, 10);
                    s = Math.floor(o / 60), r = o % 60
                }
                var d = new Date(i[a[2]].value, i[a[1]].value, i[a[0]].value, s, r);
                if (s = r = 0, dhtmlx.defined(a[3])) {
                    var o = parseInt(i[a.size + a[3]].value, 10);
                    s = Math.floor(o / 60), r = o % 60
                }
                var l = new Date(i[a[2] + a.size].value, i[a[1] + a.size].value, i[a[0] + a.size].value, s, r);
                d >= l && (l = gantt.date.add(d, gantt._get_timepicker_step(), "minute"));
                var _ = gantt._resolve_default_mapping(n),
                    h = {
                        start_date: new Date(d),
                        end_date: new Date(l)
                    };
                return "string" == typeof _ ? h.start_date : h
            },
            focus: function(t) {
                gantt._focus(t.getElementsByTagName("select")[0])
            }
        },
        duration: {
            render: function(t) {
                var e = this.form_blocks.getTimePicker.call(this, t);
                e = "<div class='gantt_time_selects'>" + e + "</div>";
                var n = this.locale.labels[this.config.duration_unit + "s"],
                    i = t.single_date ? ' style="display:none"' : "",
                    a = t.readonly ? " disabled='disabled'" : "",
                    s = "<div class='gantt_duration' " + i + "><input type='button' class='gantt_duration_dec' value='-'" + a + "><input type='text' value='5' class='gantt_duration_value'" + a + "><input type='button' class='gantt_duration_inc' value='+'" + a + "> " + n + " <span></span></div>",
                    r = "<div style='height:30px;padding-top:0px;font-size:inherit;' class='gantt_section_time'>" + e + " " + s + "</div>";
                return r
            },
            set_value: function(t, e, n, i) {
                function a() {
                    var e = gantt.form_blocks.duration._get_start_date.call(gantt, t, i),
                        n = gantt.form_blocks.duration._get_duration.call(gantt, t, i),
                        a = gantt.calculateEndDate(e, n);
                    h.innerHTML = gantt.templates.task_date(a)
                }

                function s(t) {
                    var e = l.value;
                    e = parseInt(e, 10), window.isNaN(e) && (e = 0), e += t, 1 > e && (e = 1), l.value = e, a()
                }
                var r = i,
                    o = t.getElementsByTagName("select"),
                    d = t.getElementsByTagName("input"),
                    l = d[1],
                    _ = [d[0], d[2]],
                    h = t.getElementsByTagName("span")[0],
                    g = i._time_format_order;
                _[0].onclick = dhtmlx.bind(function() {
                    s(-1 * this.config.duration_step)
                }, this), _[1].onclick = dhtmlx.bind(function() {
                    s(1 * this.config.duration_step)
                }, this), o[0].onchange = a, o[1].onchange = a, o[2].onchange = a, o[3] && (o[3].onchange = a), l.onkeydown = dhtmlx.bind(function(t) {
                    t = t || window.event;
                    var e = t.charCode || t.keyCode || t.which;
                    return 40 == e ? (s(-1 * this.config.duration_step), !1) : 38 == e ? (s(1 * this.config.duration_step), !1) : void window.setTimeout(function() {
                        a()
                    }, 1)
                }, this), l.onchange = dhtmlx.bind(function() {
                    a()
                }, this);
                var c = gantt._resolve_default_mapping(i);
                "string" == typeof c && (c = {
                    start_date: c
                });
                var u = n[c.start_date] || new Date,
                    f = n[c.end_date] || gantt.calculateEndDate(u, 1),
                    p = Math.round(n[c.duration]) || gantt.calculateDuration(u, f);
                gantt.form_blocks._fill_lightbox_select(o, 0, u, g, r), l.value = p, a()
            },
            _get_start_date: function(t, e) {
                var n = t.getElementsByTagName("select"),
                    i = e._time_format_order,
                    a = 0,
                    s = 0;
                if (dhtmlx.defined(i[3])) {
                    var r = n[i[3]],
                        o = parseInt(r.value, 10);
                    isNaN(o) && r.hasAttribute("data-value") && (o = parseInt(r.getAttribute("data-value"), 10)), a = Math.floor(o / 60), s = o % 60
                }
                return new Date(n[i[2]].value, n[i[1]].value, n[i[0]].value, a, s)
            },
            _get_duration: function(t) {
                var e = t.getElementsByTagName("input")[1];
                return e = parseInt(e.value, 10), (!e || window.isNaN(e)) && (e = 1), 0 > e && (e *= -1), e
            },
            get_value: function(t, e, n) {
                var i = gantt.form_blocks.duration._get_start_date(t, n),
                    a = gantt.form_blocks.duration._get_duration(t, n),
                    s = gantt.calculateEndDate(i, a),
                    r = gantt._resolve_default_mapping(n),
                    o = {
                        start_date: new Date(i),
                        end_date: new Date(s),
                        duration: a
                    };
                return "string" == typeof r ? o.start_date : o
            },
            focus: function(t) {
                gantt._focus(t.getElementsByTagName("select")[0])
            }
        },
        parent: {
            _filter: function(t, e, n) {
                var i = e.filter || function() {
                    return !0
                };
                t = t.slice(0);
                for (var a = 0; a < t.length; a++) {
                    var s = t[a];
                    (s.id == n || gantt.isChildOf(s.id, n) || i(s.id, s) === !1) && (t.splice(a, 1), a--)
                }
                return t
            },
            _display: function(t, e) {
                var n = [],
                    i = [];
                e && (n = gantt.getTaskByTime(), t.allow_root && n.unshift({
                    id: gantt.config.root_id,
                    text: t.root_label || ""
                }), n = this._filter(n, t, e), t.sort && n.sort(t.sort));
                for (var a = t.template || gantt.templates.task_text, s = 0; s < n.length; s++) {
                    var r = a.apply(gantt, [n[s].start_date, n[s].end_date, n[s]]);
                    void 0 === r && (r = ""), i.push({
                        key: n[s].id,
                        label: r
                    })
                }
                return t.options = i, t.map_to = t.map_to || "parent", gantt.form_blocks.select.render.apply(this, arguments)
            },
            render: function(t) {
                return gantt.form_blocks.parent._display(t, !1)
            },
            set_value: function(t, e, n, i) {
                var a = document.createElement("div");
                a.innerHTML = gantt.form_blocks.parent._display(i, n.id);
                var s = a.removeChild(a.firstChild);
                return t.onselect = null, t.parentNode.replaceChild(s, t), gantt.form_blocks.select.set_value.apply(gantt, [s, e, n, i])
            },
            get_value: function() {
                return gantt.form_blocks.select.get_value.apply(gantt, arguments)
            },
            focus: function() {
                return gantt.form_blocks.select.focus.apply(gantt, arguments)
            }
        }
    }, gantt._is_lightbox_timepicker = function() {
        for (var t = this._get_typed_lightbox_config(), e = 0; e < t.length; e++)
            if ("time" == t[e].name && "time" == t[e].type) return !0;
        return !1
    }, gantt._dhtmlx_confirm = function(t, e, n, i) {
        if (!t) return n();
        var a = {
            text: t
        };
        e && (a.title = e), i && (a.ok = i), n && (a.callback = function(t) {
            t && n()
        }), dhtmlx.confirm(a)
    }, gantt._get_typed_lightbox_config = function(t) {
        void 0 === t && (t = this.getLightboxType());
        var e = this._get_type_name(t);
        return gantt.config.lightbox[e + "_sections"] ? gantt.config.lightbox[e + "_sections"] : gantt.config.lightbox.sections
    }, gantt._silent_redraw_lightbox = function(t) {
        var e = this.getLightboxType();
        if (this.getState().lightbox) {
            var n = this.getState().lightbox,
                i = this.getLightboxValues(),
                a = dhtmlx.copy(this.getTask(n));
            this.resetLightbox();
            var s = dhtmlx.mixin(a, i, !0),
                r = this.getLightbox(t ? t : void 0);
            this._center_lightbox(this.getLightbox()), this._set_lightbox_values(s, r), this.callEvent("onLightboxChange", [e, this.getLightboxType()])
        } else this.resetLightbox(), this.getLightbox(t ? t : void 0);
        this.callEvent("onLightboxChange", [e, this.getLightboxType()])
    }, gantt._extend_to_optional = function(t) {
        var e = t,
            n = {
                render: e.render,
                focus: e.focus,
                set_value: function(t, i, a, s) {
                    var r = gantt._resolve_default_mapping(s);
                    if (a[r.start_date]) return n.enable(t, s), e.set_value.call(gantt, t, i, a, s);
                    n.disable(t, s);
                    var o = {};
                    for (var d in r) o[r[d]] = a[d];
                    return e.set_value.call(gantt, t, i, o, s)
                },
                get_value: function(t, n, i) {
                    return i.disabled ? {
                        start_date: null
                    } : e.get_value.call(gantt, t, n, i)
                },
                update_block: function(t, e) {
                    if (gantt.callEvent("onSectionToggle", [gantt._lightbox_id, e]), t.style.display = e.disabled ? "none" : "block", e.button) {
                        var n = t.previousSibling.firstChild.firstChild,
                            i = gantt.locale.labels,
                            a = e.disabled ? i[e.name + "_enable_button"] : i[e.name + "_disable_button"];
                        n.nextSibling.innerHTML = a
                    }
                    gantt.resizeLightbox()
                },
                disable: function(t, e) {
                    e.disabled = !0, n.update_block(t, e)
                },
                enable: function(t, e) {
                    e.disabled = !1, n.update_block(t, e)
                },
                button_click: function(t, e, i, a) {
                    if (gantt.callEvent("onSectionButton", [gantt._lightbox_id, i]) !== !1) {
                        var s = gantt._get_typed_lightbox_config()[t];
                        s.disabled ? n.enable(a, s) : n.disable(a, s)
                    }
                }
            };
        return n
    }, gantt.form_blocks.duration_optional = gantt._extend_to_optional(gantt.form_blocks.duration), gantt.form_blocks.time_optional = gantt._extend_to_optional(gantt.form_blocks.time), dataProcessor.prototype = {
        setTransactionMode: function(t, e) {
            this._tMode = t, this._tSend = e
        },
        escape: function(t) {
            return this._utf ? encodeURIComponent(t) : escape(t)
        },
        enableUTFencoding: function(t) {
            this._utf = convertStringToBoolean(t)
        },
        setDataColumns: function(t) {
            this._columns = "string" == typeof t ? t.split(",") : t
        },
        getSyncState: function() {
            return !this.updatedRows.length
        },
        enableDataNames: function(t) {
            this._endnm = convertStringToBoolean(t)
        },
        enablePartialDataSend: function(t) {
            this._changed = convertStringToBoolean(t)
        },
        setUpdateMode: function(t, e) {
            this.autoUpdate = "cell" == t, this.updateMode = t, this.dnd = e
        },
        ignore: function(t, e) {
            this._silent_mode = !0, t.call(e || window), this._silent_mode = !1
        },
        setUpdated: function(t, e, n) {
            if (!this._silent_mode) {
                var i = this.findRow(t);
                n = n || "updated";
                var a = this.obj.getUserData(t, this.action_param);
                a && "updated" == n && (n = a), e ? (this.set_invalid(t, !1), this.updatedRows[i] = t, this.obj.setUserData(t, this.action_param, n), this._in_progress[t] && (this._in_progress[t] = "wait")) : this.is_invalid(t) || (this.updatedRows.splice(i, 1), this.obj.setUserData(t, this.action_param, "")), e || this._clearUpdateFlag(t), this.markRow(t, e, n), e && this.autoUpdate && this.sendData(t)
            }
        },
        _clearUpdateFlag: function() {},
        markRow: function(t, e, n) {
            var i = "",
                a = this.is_invalid(t);
            if (a && (i = this.styles[a], e = !0), this.callEvent("onRowMark", [t, e, n, a]) && (i = this.styles[e ? n : "clear"] + i, this.obj[this._methods[0]](t, i), a && a.details)) {
                i += this.styles[a + "_cell"];
                for (var s = 0; s < a.details.length; s++) a.details[s] && this.obj[this._methods[1]](t, s, i)
            }
        },
        getState: function(t) {
            return this.obj.getUserData(t, this.action_param)
        },
        is_invalid: function(t) {
            return this._invalid[t]
        },
        set_invalid: function(t, e, n) {
            n && (e = {
                value: e,
                details: n,
                toString: function() {
                    return this.value.toString()
                }
            }), this._invalid[t] = e
        },
        checkBeforeUpdate: function() {
            return !0
        },
        sendData: function(t) {
            return !this._waitMode || "tree" != this.obj.mytype && !this.obj._h2 ? (this.obj.editStop && this.obj.editStop(), "undefined" == typeof t || this._tSend ? this.sendAllData() : this._in_progress[t] ? !1 : (this.messages = [], !this.checkBeforeUpdate(t) && this.callEvent("onValidationError", [t, this.messages]) ? !1 : void this._beforeSendData(this._getRowData(t), t))) : void 0
        },
        _beforeSendData: function(t, e) {
            return this.callEvent("onBeforeUpdate", [e, this.getState(e), t]) ? void this._sendData(t, e) : !1
        },
        serialize: function(t, e) {
            if ("string" == typeof t) return t;
            if ("undefined" != typeof e) return this.serialize_one(t, "");
            var n = [],
                i = [];
            for (var a in t) t.hasOwnProperty(a) && (n.push(this.serialize_one(t[a], a + this.post_delim)), i.push(a));
            return n.push("ids=" + this.escape(i.join(","))), dhtmlx.security_key && n.push("dhx_security=" + dhtmlx.security_key), n.join("&")
        },
        serialize_one: function(t, e) {
            if ("string" == typeof t) return t;
            var n = [];
            for (var i in t) t.hasOwnProperty(i) && n.push(this.escape((e || "") + i) + "=" + this.escape(t[i]));
            return n.join("&")
        },
        _sendData: function(t, e) {
            if (t) {
                if (!this.callEvent("onBeforeDataSending", e ? [e, this.getState(e), t] : [null, null, t])) return !1;
                e && (this._in_progress[e] = (new Date).valueOf());
                var n = new dtmlXMLLoaderObject(this.afterUpdate, this, !0),
                    i = this.serverProcessor + (this._user ? getUrlSymbol(this.serverProcessor) + ["dhx_user=" + this._user, "dhx_version=" + this.obj.getUserData(0, "version")].join("&") : "");
                "POST" != this._tMode ? n.loadXML(i + (-1 != i.indexOf("?") ? "&" : "?") + this.serialize(t, e)) : n.loadXML(i, !0, this.serialize(t, e)), this._waitMode++
            }
        },
        sendAllData: function() {
            if (this.updatedRows.length) {
                this.messages = [];
                for (var t = !0, e = 0; e < this.updatedRows.length; e++) t &= this.checkBeforeUpdate(this.updatedRows[e]);
                if (!t && !this.callEvent("onValidationError", ["", this.messages])) return !1;
                if (this._tSend) this._sendData(this._getAllData());
                else
                    for (var e = 0; e < this.updatedRows.length; e++)
                        if (!this._in_progress[this.updatedRows[e]]) {
                            if (this.is_invalid(this.updatedRows[e])) continue;
                            if (this._beforeSendData(this._getRowData(this.updatedRows[e]), this.updatedRows[e]), this._waitMode && ("tree" == this.obj.mytype || this.obj._h2)) return
                        }
            }
        },
        _getAllData: function() {
            for (var t = {}, e = !1, n = 0; n < this.updatedRows.length; n++) {
                var i = this.updatedRows[n];
                this._in_progress[i] || this.is_invalid(i) || this.callEvent("onBeforeUpdate", [i, this.getState(i)]) && (t[i] = this._getRowData(i, i + this.post_delim), e = !0, this._in_progress[i] = (new Date).valueOf())
            }
            return e ? t : null
        },
        setVerificator: function(t, e) {
            this.mandatoryFields[t] = e || function(t) {
                return "" !== t
            }
        },
        clearVerificator: function(t) {
            this.mandatoryFields[t] = !1
        },
        findRow: function(t) {
            var e = 0;
            for (e = 0; e < this.updatedRows.length && t != this.updatedRows[e]; e++);
            return e
        },
        defineAction: function(t, e) {
            this._uActions || (this._uActions = []), this._uActions[t] = e
        },
        afterUpdateCallback: function(t, e, n, i) {
            var a = t,
                s = "error" != n && "invalid" != n;
            if (s || this.set_invalid(t, n), this._uActions && this._uActions[n] && !this._uActions[n](i)) return delete this._in_progress[a];
            "wait" != this._in_progress[a] && this.setUpdated(t, !1);
            var r = t;
            switch (n) {
                case "inserted":
                case "insert":
                    e != t && (this.obj[this._methods[2]](t, e), t = e);
                    break;
                case "delete":
                case "deleted":
                    return this.obj.setUserData(t, this.action_param, "true_deleted"), this.obj[this._methods[3]](t), delete this._in_progress[a], this.callEvent("onAfterUpdate", [t, n, e, i])
            }
            "wait" != this._in_progress[a] ? (s && this.obj.setUserData(t, this.action_param, ""), delete this._in_progress[a]) : (delete this._in_progress[a], this.setUpdated(e, !0, this.obj.getUserData(t, this.action_param))), this.callEvent("onAfterUpdate", [r, n, e, i])
        },
        afterUpdate: function(t, e, n, i, a) {
            if (a.getXMLTopNode("data"), a.xmlDoc.responseXML) {
                for (var s = a.doXPath("//data/action"), r = 0; r < s.length; r++) {
                    var o = s[r],
                        d = o.getAttribute("type"),
                        l = o.getAttribute("sid"),
                        _ = o.getAttribute("tid");
                    t.afterUpdateCallback(l, _, d, o)
                }
                t.finalizeUpdate()
            }
        },
        finalizeUpdate: function() {
            this._waitMode && this._waitMode--, ("tree" == this.obj.mytype || this.obj._h2) && this.updatedRows.length && this.sendData(), this.callEvent("onAfterUpdateFinish", []), this.updatedRows.length || this.callEvent("onFullSync", [])
        },
        init: function(t) {
            this.obj = t, this.obj._dp_init && this.obj._dp_init(this)
        },
        setOnAfterUpdate: function(t) {
            this.attachEvent("onAfterUpdate", t)
        },
        enableDebug: function() {},
        setOnBeforeUpdateHandler: function(t) {
            this.attachEvent("onBeforeDataSending", t)
        },
        setAutoUpdate: function(t, e) {
            t = t || 2e3, this._user = e || (new Date).valueOf(), this._need_update = !1, this._loader = null, this._update_busy = !1, this.attachEvent("onAfterUpdate", function(t, e, n, i) {
                this.afterAutoUpdate(t, e, n, i)
            }), this.attachEvent("onFullSync", function() {
                this.fullSync()
            });
            var n = this;
            window.setInterval(function() {
                n.loadUpdate()
            }, t)
        },
        afterAutoUpdate: function(t, e) {
            return "collision" == e ? (this._need_update = !0, !1) : !0
        },
        fullSync: function() {
            return this._need_update === !0 && (this._need_update = !1, this.loadUpdate()), !0
        },
        getUpdates: function(t, e) {
            return this._update_busy ? !1 : (this._update_busy = !0, this._loader = this._loader || new dtmlXMLLoaderObject(!0), this._loader.async = !0, this._loader.waitCall = e, void this._loader.loadXML(t))
        },
        _v: function(t) {
            return t.firstChild ? t.firstChild.nodeValue : ""
        },
        _a: function(t) {
            for (var e = [], n = 0; n < t.length; n++) e[n] = this._v(t[n]);
            return e
        },
        loadUpdate: function() {
            var t = this,
                e = this.obj.getUserData(0, "version"),
                n = this.serverProcessor + getUrlSymbol(this.serverProcessor) + ["dhx_user=" + this._user, "dhx_version=" + e].join("&");
            n = n.replace("editing=true&", ""), this.getUpdates(n, function() {
                var e = t._loader.doXPath("//userdata");
                t.obj.setUserData(0, "version", t._v(e[0]));
                var n = t._loader.doXPath("//update");
                if (n.length) {
                    t._silent_mode = !0;
                    for (var i = 0; i < n.length; i++) {
                        var a = n[i].getAttribute("status"),
                            s = n[i].getAttribute("id"),
                            r = n[i].getAttribute("parent");
                        switch (a) {
                            case "inserted":
                                t.callEvent("insertCallback", [n[i], s, r]);
                                break;
                            case "updated":
                                t.callEvent("updateCallback", [n[i], s, r]);
                                break;
                            case "deleted":
                                t.callEvent("deleteCallback", [n[i], s, r])
                        }
                    }
                    t._silent_mode = !1
                }
                t._update_busy = !1, t = null
            })
        }
    }, dhtmlx.assert = function(t, e) {
        t || dhtmlx.message({
            type: "error",
            text: e,
            expire: -1
        })
    }, gantt.init = function(t, e, n) {
        e && n && (this.config.start_date = this._min_date = new Date(e), this.config.end_date = this._max_date = new Date(n)), this._init_skin(), this.config.scroll_size || (this.config.scroll_size = this._detectScrollSize()), dhtmlxEvent(window, "resize", this._on_resize), this.init = function(t) {
            this.$container && this.$container.parentNode && (this.$container.parentNode.removeChild(this.$container), this.$container = null), this._reinit(t)
        }, this._reinit(t)
    }, gantt._reinit = function(t) {
        this._init_html_area(t), this._set_sizes(), this._clear_renderers(), this.resetLightbox(), this._update_flags(), this._init_touch_events(), this._init_templates(), this._init_grid(), this._init_tasks(), this._set_scroll_events(), dhtmlxEvent(this.$container, "click", this._on_click), dhtmlxEvent(this.$container, "dblclick", this._on_dblclick), dhtmlxEvent(this.$container, "mousemove", this._on_mousemove), dhtmlxEvent(this.$container, "contextmenu", this._on_contextmenu), this.callEvent("onGanttReady", []), this.render()
    }, gantt._init_html_area = function(t) {
        this._obj = "string" == typeof t ? document.getElementById(t) : t, dhtmlx.assert(this._obj, "Invalid html container: " + t);
        var e = "<div class='gantt_container'><div class='gantt_grid'></div><div class='gantt_task'></div>";
        e += "<div class='gantt_ver_scroll'><div></div></div><div class='gantt_hor_scroll'><div></div></div></div>", this._obj.innerHTML = e, this.$container = this._obj.firstChild;
        var n = this.$container.childNodes;
        this.$grid = n[0], this.$task = n[1], this.$scroll_ver = n[2], this.$scroll_hor = n[3], this.$grid.innerHTML = "<div class='gantt_grid_scale'></div><div class='gantt_grid_data'></div>", this.$grid_scale = this.$grid.childNodes[0], this.$grid_data = this.$grid.childNodes[1], this.$task.innerHTML = "<div class='gantt_task_scale'></div><div class='gantt_data_area'><div class='gantt_task_bg'></div><div class='gantt_links_area'></div><div class='gantt_bars_area'></div></div>", this.$task_scale = this.$task.childNodes[0], this.$task_data = this.$task.childNodes[1], this.$task_bg = this.$task_data.childNodes[0], this.$task_links = this.$task_data.childNodes[1], this.$task_bars = this.$task_data.childNodes[2]
    }, gantt.$click = {
        buttons: {
            edit: function(t) {
                gantt.showLightbox(t)
            },
            "delete": function(t) {
                var e = gantt.locale.labels.confirm_deleting,
                    n = gantt.locale.labels.confirm_deleting_title;
                gantt._dhtmlx_confirm(e, n, function() {
                    var e = gantt.getTask(t);
                    e.$new ? (gantt._deleteTask(t, !0), gantt.refreshData()) : gantt.deleteTask(t), gantt.hideLightbox()
                })
            }
        }
    }, gantt._calculate_content_height = function() {
        var t = this.config.scale_height,
            e = this._order.length * this.config.row_height,
            n = this._scroll_hor ? this.config.scroll_size + 1 : 0;
        return this._is_grid_visible() || this._is_chart_visible() ? t + e + 2 + n : 0
    }, gantt._calculate_content_width = function() {
        {
            var t = this._get_grid_width(),
                e = this._tasks ? this._tasks.full_width : 0;
            this._scroll_ver ? this.config.scroll_size + 1 : 0
        }
        return this._is_chart_visible() || (e = 0), this._is_grid_visible() || (t = 0), t + e + 1
    }, gantt._get_resize_options = function() {
        var t = {
            x: !1,
            y: !1
        };
        return "xy" == this.config.autosize ? t.x = t.y = !0 : "y" == this.config.autosize || this.config.autosize === !0 ? t.y = !0 : "x" == this.config.autosize && (t.x = !0), t
    }, gantt._clean_el_size = function(t) {
        return 1 * (t || "").toString().replace("px", "") || 0
    }, gantt._get_box_styles = function() {
        var t = null;
        t = window.getComputedStyle ? window.getComputedStyle(this._obj, null) : {
            width: this._obj.clientWidth,
            height: this._obj.clientHeight
        };
        var e = ["width", "height", "paddingTop", "paddingBottom", "paddingLeft", "paddingRight", "borderLeftWidth", "borderRightWidth", "borderTopWidth", "borderBottomWidth"],
            n = {
                boxSizing: "border-box" == t.boxSizing
            };
        t.MozBoxSizing && (n.boxSizing = "border-box" == t.MozBoxSizing);
        for (var i = 0; i < e.length; i++) n[e[i]] = t[e[i]] ? this._clean_el_size(t[e[i]]) : 0;
        var a = {
            horPaddings: n.paddingLeft + n.paddingRight + n.borderLeftWidth + n.borderRightWidth,
            vertPaddings: n.paddingTop + n.paddingBottom + n.borderTopWidth + n.borderBottomWidth,
            borderBox: n.boxSizing,
            innerWidth: n.width,
            innerHeight: n.height,
            outerWidth: n.width,
            outerHeight: n.height
        };
        return a.borderBox ? (a.innerWidth -= a.horPaddings, a.innerHeight -= a.vertPaddings) : (a.outerWidth += a.horPaddings, a.outerHeight += a.vertPaddings), a
    }, gantt._do_autosize = function() {
        var t = this._get_resize_options(),
            e = this._get_box_styles();
        if (t.y) {
            var n = this._calculate_content_height();
            e.borderBox && (n += e.vertPaddings), this._obj.style.height = n + "px"
        }
        if (t.x) {
            var i = this._calculate_content_width();
            e.borderBox && (i += e.horPaddings), this._obj.style.width = i + "px"
        }
    }, gantt._set_sizes = function() {
        this._do_autosize();
        var t = this._get_box_styles();
        if (this._y = t.innerHeight, !(this._y < 20)) {
            this.$grid.style.height = this.$task.style.height = Math.max(this._y - this.$scroll_hor.offsetHeight - 2, 0) + "px";
            var e = Math.max(this._y - (this.config.scale_height || 0) - this.$scroll_hor.offsetHeight - 2, 0);
            this.$grid_data.style.height = this.$task_data.style.height = e + "px";
            var n = Math.max(this._get_grid_width() - 1, 0);
            this.$grid.style.width = n + "px", this.$grid.style.display = 0 === n ? "none" : "", t = this._get_box_styles(), this._x = t.innerWidth, this._x < 20 || (this.$grid_data.style.width = Math.max(this._get_grid_width() - 1, 0) + "px", this.$task.style.width = Math.max(this._x - this._get_grid_width() - 2, 0) + "px")
        }
    }, gantt.getScrollState = function() {
        return this.$task && this.$task_data ? {
            x: this.$task.scrollLeft,
            y: this.$task_data.scrollTop
        } : null
    }, gantt._save_scroll_state = function(t, e) {
        var n = {};
        this._cached_scroll_pos = this._cached_scroll_pos || {}, void 0 !== t && (n.x = t), void 0 !== e && (n.y = e), dhtmlx.mixin(this._cached_scroll_pos, n, !0)
    }, gantt._restore_scroll_state = function() {
        return this._cached_scroll_pos || null
    }, gantt.scrollTo = function(t, e) {
        1 * t == t && (this.$task.scrollLeft = t, this._save_scroll_state(t, void 0)), 1 * e == e && (this.$task_data.scrollTop = e, this.$grid_data.scrollTop = e, this._save_scroll_state(void 0, e))
    }, gantt.showDate = function(t) {
        var e = this.posFromDate(t),
            n = Math.max(e - this.config.task_scroll_offset, 0);
        this.scrollTo(n)
    }, gantt.showTask = function(t) {
        var e = this.getTaskNode(t);
        if (e) {
            var n = Math.max(e.offsetLeft - this.config.task_scroll_offset, 0),
                i = e.offsetTop - (this.$task_data.offsetHeight - this.config.row_height) / 2;
            this.scrollTo(n, i)
        }
    }, gantt._on_resize = gantt.setSizes = function() {
        gantt._set_sizes(), gantt._scroll_resize()
    }, gantt.render = function() {
        var t = dhtmlx.copy(this._restore_scroll_state()),
            e = null;
        if (t && (e = gantt._date_from_pos(t.x + this.config.task_scroll_offset)), this._render_grid(), this._render_tasks_scales(), this._scroll_resize(), this._on_resize(), this._render_data(), this.config.preserve_scroll && t) {
            var n = gantt._restore_scroll_state(),
                i = gantt._date_from_pos(n.x);
            (+e != +i || n.y != t.y) && (e && this.showDate(e), gantt.scrollTo(void 0, t.y))
        }
        this.callEvent("onGanttRender", [])
    }, gantt._set_scroll_events = function() {
        function t(t) {
            var n = gantt._get_resize_options();
            gantt._wheel_time = new Date;
            var i = e ? -20 * t.deltaX : 2 * t.wheelDeltaX,
                a = e ? -40 * t.deltaY : t.wheelDelta;
            if (i && Math.abs(i) > Math.abs(a)) {
                if (n.x) return !0;
                var s = i / -40,
                    r = gantt.$task.scrollLeft + 30 * s;
                gantt.scrollTo(r, null), gantt.$scroll_hor.scrollTop = o
            } else {
                if (n.y) return !0;
                var s = a / -40;
                "undefined" == typeof a && (s = t.detail);
                var o = gantt.$grid_data.scrollTop + 30 * s;
                gantt.scrollTo(null, o), gantt.$scroll_ver.scrollTop = o
            }
            return t.preventDefault && t.preventDefault(), t.cancelBubble = !0, !1
        }
        dhtmlxEvent(this.$scroll_hor, "scroll", function() {
            if (new Date - (gantt._wheel_time || 0) < 100) return !0;
            if (!gantt._touch_scroll_active) {
                var t = gantt.$scroll_hor.scrollLeft;
                gantt.scrollTo(t)
            }
        }), dhtmlxEvent(this.$scroll_ver, "scroll", function() {
            if (!gantt._touch_scroll_active) {
                var t = gantt.$scroll_ver.scrollTop;
                gantt.$grid_data.scrollTop = t, gantt.scrollTo(null, t)
            }
        }), dhtmlxEvent(this.$task, "scroll", function() {
            var t = gantt.$task.scrollLeft,
                e = gantt.$scroll_hor.scrollLeft;
            e != t && (gantt.$scroll_hor.scrollLeft = t)
        }), dhtmlxEvent(this.$task_data, "scroll", function() {
            var t = gantt.$task_data.scrollTop,
                e = gantt.$scroll_ver.scrollTop;
            e != t && (gantt.$scroll_ver.scrollTop = t)
        });
        var e = _isFF && !window._KHTMLrv;
        e ? dhtmlxEvent(gantt.$container, "wheel", t) : dhtmlxEvent(gantt.$container, "mousewheel", t)
    }, gantt._scroll_resize = function() {
        if (!(this._x < 20 || this._y < 20)) {
            var t = this._get_grid_width(),
                e = Math.max(this._x - t, 0),
                n = Math.max(this._y - this.config.scale_height, 0),
                i = this.config.scroll_size + 1,
                a = Math.max(this.$task_data.offsetWidth - i, 0),
                s = this.config.row_height * this._order.length,
                r = this._get_resize_options(),
                o = this._scroll_hor = r.x ? !1 : a > e,
                d = this._scroll_ver = r.y ? !1 : s > n;
            this.$scroll_hor.style.display = o ? "block" : "none", this.$scroll_hor.style.height = (o ? i : 0) + "px", this.$scroll_hor.style.width = Math.max(this._x - (d ? i : 2), 0) + "px", this.$scroll_hor.firstChild.style.width = a + t + i + 2 + "px", this.$scroll_ver.style.display = d ? "block" : "none", this.$scroll_ver.style.width = (d ? i : 0) + "px", this.$scroll_ver.style.height = Math.max(this._y - (o ? i : 0) - this.config.scale_height, 0) + "px", this.$scroll_ver.style.top = this.config.scale_height + "px", this.$scroll_ver.firstChild.style.height = this.config.scale_height + s + "px"
        }
    }, gantt.locate = function(t) {
        var e = gantt._get_target_node(t);
        if ((e.className || "").indexOf("gantt_task_cell") >= 0) return null;
        for (var n = arguments[1] || this.config.task_attribute; e;) {
            if (e.getAttribute) {
                var i = e.getAttribute(n);
                if (i) return i
            }
            e = e.parentNode
        }
        return null
    }, gantt._get_target_node = function(t) {
        var e;
        return t.tagName ? e = t : (t = t || window.event, e = t.target || t.srcElement), e
    }, gantt._trim = function(t) {
        var e = String.prototype.trim || function() {
            return this.replace(/^\s+|\s+$/g, "")
        };
        return e.apply(t)
    }, gantt._locate_css = function(t, e, n) {
        void 0 === n && (n = !0);
        for (var i = gantt._get_target_node(t), a = ""; i;) {
            if (a = i.className) {
                var s = a.indexOf(e);
                if (s >= 0) {
                    if (!n) return i;
                    var r = 0 === s || !gantt._trim(a.charAt(s - 1)),
                        o = s + e.length >= a.length || !gantt._trim(a.charAt(s + e.length));
                    if (r && o) return i
                }
            }
            i = i.parentNode
        }
        return null
    }, gantt._locateHTML = function(t, e) {
        var n = gantt._get_target_node(t);
        for (e = e || this.config.task_attribute; n;) {
            if (n.getAttribute) {
                var i = n.getAttribute(e);
                if (i) return n
            }
            n = n.parentNode
        }
        return null
    }, gantt.getTaskRowNode = function(t) {
        for (var e = this.$grid_data.childNodes, n = this.config.task_attribute, i = 0; i < e.length; i++)
            if (e[i].getAttribute) {
                var a = e[i].getAttribute(n);
                if (a == t) return e[i]
            }
        return null
    }, gantt.getState = function() {
        return {
            drag_id: this._tasks_dnd.drag.id,
            drag_mode: this._tasks_dnd.drag.mode,
            drag_from_start: this._tasks_dnd.drag.left,
            selected_task: this._selected_task,
            min_date: new Date(this._min_date),
            max_date: new Date(this._max_date),
            lightbox: this._lightbox_id,
            touch_drag: this._touch_drag
        }
    }, gantt._checkTimeout = function(t, e) {
        if (!e) return !0;
        var n = 1e3 / e;
        return 1 > n ? !0 : t._on_timeout ? !1 : (setTimeout(function() {
            delete t._on_timeout
        }, n), t._on_timeout = !0, !0)
    }, gantt.selectTask = function(t) {
        if (!this.config.select_task) return !1;
        if (t) {
            if (this._selected_task == t) return this._selected_task;
            if (!this.callEvent("onBeforeTaskSelected", [t])) return !1;
            this.unselectTask(), this._selected_task = t, this.refreshTask(t), this.callEvent("onTaskSelected", [t])
        }
        return this._selected_task
    }, gantt.unselectTask = function() {
        var t = this._selected_task;
        t && (this._selected_task = null, this.refreshTask(t), this.callEvent("onTaskUnselected", [t]))
    }, gantt.getSelectedId = function() {
        return dhtmlx.defined(this._selected_task) ? this._selected_task : null
    }, gantt.changeLightboxType = function(t) {
        return this.getLightboxType() == t ? !0 : void gantt._silent_redraw_lightbox(t)
    },
    function() {
        if (gantt._modules && gantt._modules.length)
            for (var t = 0; t < gantt._modules.length; t++) gantt._modules[t](gantt)
    }(), gantt.date = {
        init: function() {
            for (var t = gantt.locale.date.month_short, e = gantt.locale.date.month_short_hash = {}, n = 0; n < t.length; n++) e[t[n]] = n;
            for (var t = gantt.locale.date.month_full, e = gantt.locale.date.month_full_hash = {}, n = 0; n < t.length; n++) e[t[n]] = n
        },
        date_part: function(t) {
            return t.setHours(0), t.setMinutes(0), t.setSeconds(0), t.setMilliseconds(0), t.getHours() && t.setTime(t.getTime() + 36e5 * (24 - t.getHours())), t
        },
        time_part: function(t) {
            return (t.valueOf() / 1e3 - 60 * t.getTimezoneOffset()) % 86400
        },
        week_start: function(t) {
            var e = t.getDay();
            return gantt.config.start_on_monday && (0 === e ? e = 6 : e--), this.date_part(this.add(t, -1 * e, "day"))
        },
        month_start: function(t) {
            return t.setDate(1), this.date_part(t)
        },
        year_start: function(t) {
            return t.setMonth(0), this.month_start(t)
        },
        day_start: function(t) {
            return this.date_part(t)
        },
        hour_start: function(t) {
            var e = t.getHours();
            return this.day_start(t), t.setHours(e), t
        },
        minute_start: function(t) {
            var e = t.getMinutes();
            return this.hour_start(t), t.setMinutes(e), t
        },
        _add_days: function(t, e) {
            var n = new Date(t.valueOf());
            return n.setDate(n.getDate() + e), !t.getHours() && n.getHours() && n.setTime(n.getTime() + 36e5 * (24 - n.getHours())), n
        },
        add: function(t, e, n) {
            var i = new Date(t.valueOf());
            switch (n) {
                case "day":
                    i = gantt.date._add_days(i, e);
                    break;
                case "week":
                    i = gantt.date._add_days(i, 7 * e);
                    break;
                case "month":
                    i.setMonth(i.getMonth() + e);
                    break;
                case "year":
                    i.setYear(i.getFullYear() + e);
                    break;
                case "hour":
                    i.setTime(i.getTime() + 60 * e * 60 * 1e3);
                    break;
                case "minute":
                    i.setTime(i.getTime() + 60 * e * 1e3);
                    break;
                default:
                    return gantt.date["add_" + n](t, e, n)
            }
            return i
        },
        to_fixed: function(t) {
            return 10 > t ? "0" + t : t
        },
        copy: function(t) {
            return new Date(t.valueOf())
        },
        date_to_str: function(t, e) {
            return t = t.replace(/%[a-zA-Z]/g, function(t) {
                switch (t) {
                    case "%d":
                        return '"+gantt.date.to_fixed(date.getDate())+"';
                    case "%m":
                        return '"+gantt.date.to_fixed((date.getMonth()+1))+"';
                    case "%j":
                        return '"+date.getDate()+"';
                    case "%n":
                        return '"+(date.getMonth()+1)+"';
                    case "%y":
                        return '"+gantt.date.to_fixed(date.getFullYear()%100)+"';
                    case "%Y":
                        return '"+date.getFullYear()+"';
                    case "%D":
                        return '"+gantt.locale.date.day_short[date.getDay()]+"';
                    case "%l":
                        return '"+gantt.locale.date.day_full[date.getDay()]+"';
                    case "%M":
                        return '"+gantt.locale.date.month_short[date.getMonth()]+"';
                    case "%F":
                        return '"+gantt.locale.date.month_full[date.getMonth()]+"';
                    case "%h":
                        return '"+gantt.date.to_fixed((date.getHours()+11)%12+1)+"';
                    case "%g":
                        return '"+((date.getHours()+11)%12+1)+"';
                    case "%G":
                        return '"+date.getHours()+"';
                    case "%H":
                        return '"+gantt.date.to_fixed(date.getHours())+"';
                    case "%i":
                        return '"+gantt.date.to_fixed(date.getMinutes())+"';
                    case "%a":
                        return '"+(date.getHours()>11?"pm":"am")+"';
                    case "%A":
                        return '"+(date.getHours()>11?"PM":"AM")+"';
                    case "%s":
                        return '"+gantt.date.to_fixed(date.getSeconds())+"';
                    case "%W":
                        return '"+gantt.date.to_fixed(gantt.date.getISOWeek(date))+"';
                    default:
                        return t
                }
            }), e && (t = t.replace(/date\.get/g, "date.getUTC")), new Function("date", 'return "' + t + '";')
        },
        str_to_date: function(t, e) {
            for (var n = "var temp=date.match(/[a-zA-Z]+|[0-9]+/g);", i = t.match(/%[a-zA-Z]/g), a = 0; a < i.length; a++) switch (i[a]) {
                case "%j":
                case "%d":
                    n += "set[2]=temp[" + a + "]||1;";
                    break;
                case "%n":
                case "%m":
                    n += "set[1]=(temp[" + a + "]||1)-1;";
                    break;
                case "%y":
                    n += "set[0]=temp[" + a + "]*1+(temp[" + a + "]>50?1900:2000);";
                    break;
                case "%g":
                case "%G":
                case "%h":
                case "%H":
                    n += "set[3]=temp[" + a + "]||0;";
                    break;
                case "%i":
                    n += "set[4]=temp[" + a + "]||0;";
                    break;
                case "%Y":
                    n += "set[0]=temp[" + a + "]||0;";
                    break;
                case "%a":
                case "%A":
                    n += "set[3]=set[3]%12+((temp[" + a + "]||'').toLowerCase()=='am'?0:12);";
                    break;
                case "%s":
                    n += "set[5]=temp[" + a + "]||0;";
                    break;
                case "%M":
                    n += "set[1]=gantt.locale.date.month_short_hash[temp[" + a + "]]||0;";
                    break;
                case "%F":
                    n += "set[1]=gantt.locale.date.month_full_hash[temp[" + a + "]]||0;"
            }
            var s = "set[0],set[1],set[2],set[3],set[4],set[5]";
            return e && (s = " Date.UTC(" + s + ")"), new Function("date", "var set=[0,0,1,0,0,0]; " + n + " return new Date(" + s + ");")
        },
        getISOWeek: function(t) {
            if (!t) return !1;
            var e = t.getDay();
            0 === e && (e = 7);
            var n = new Date(t.valueOf());
            n.setDate(t.getDate() + (4 - e));
            var i = n.getFullYear(),
                a = Math.round((n.getTime() - new Date(i, 0, 1).getTime()) / 864e5),
                s = 1 + Math.floor(a / 7);
            return s
        },
        getUTCISOWeek: function(t) {
            return this.getISOWeek(t)
        },
        convert_to_utc: function(t) {
            return new Date(t.getUTCFullYear(), t.getUTCMonth(), t.getUTCDate(), t.getUTCHours(), t.getUTCMinutes(), t.getUTCSeconds())
        },
        parseDate: function(t, e) {
            return "string" == typeof t && (dhtmlx.defined(e) && (e = "string" == typeof e ? dhtmlx.defined(gantt.templates[e]) ? gantt.templates[e] : gantt.date.str_to_date(e) : gantt.templates.xml_date), t = t ? e(t) : null), t
        }
    }, gantt.config || (gantt.config = {}), gantt.config || (gantt.config = {}), gantt.templates || (gantt.templates = {}),
    function() {
        dhtmlx.mixin(gantt.config, {
            links: {
                finish_to_start: "0",
                start_to_start: "1",
                finish_to_finish: "2",
                start_to_finish: "3"
            },
            types: {
                task: "task",
                project: "project",
                milestone: "milestone"
            },
            duration_unit: "day",
            work_time: !1,
            correct_work_time: !1,
            skip_off_time: !1,
            autosize: !1,
            autosize_min_width: 0,
            show_links: !0,
            show_task_cells: !0,
            static_background: !1,
            branch_loading: !1,
            show_loading: !1,
            show_chart: !0,
            show_grid: !0,
            min_duration: 36e5,
            xml_date: "%d-%m-%Y %H:%i",
            api_date: "%d-%m-%Y %H:%i",
            start_on_monday: !0,
            server_utc: !1,
            show_progress: !0,
            fit_tasks: !1,
            select_task: !0,
            preserve_scroll: !0,
            readonly: !1,
            date_grid: "%Y-%m-%d",
            drag_links: !0,
            drag_progress: !0,
            drag_resize: !0,
            drag_move: !0,
            drag_mode: {
                resize: "resize",
                progress: "progress",
                move: "move",
                ignore: "ignore"
            },
            round_dnd_dates: !0,
            link_wrapper_width: 20,
            root_id: 0,
            autofit: !0,
            columns: [{
                name: "text",
                tree: !0,
                width: "*",
                resize: !0
            }, {
                name: "start_date",
                align: "center",
                resize: !0
            }, {
                name: "duration",
                align: "center"
            }, {
                name: "add",
                width: "44"
            }],
            step: 1,
            scale_unit: "day",
            scale_offset_minimal: !0,
            subscales: [],
            inherit_scale_class: !1,
            time_step: 60,
            duration_step: 1,
            date_scale: "%d %M",
            task_date: "%d %F %Y",
            time_picker: "%H:%i",
            task_attribute: "task_id",
            link_attribute: "link_id",
            layer_attribute: "data-layer",
            buttons_left: ["gantt_save_btn", "gantt_cancel_btn"],
            _migrate_buttons: {
                dhx_save_btn: "gantt_save_btn",
                dhx_cancel_btn: "gantt_cancel_btn",
                dhx_delete_btn: "gantt_delete_btn"
            },
            buttons_right: ["gantt_delete_btn"],
            lightbox: {
                sections: [{
                    name: "description",
                    height: 70,
                    map_to: "text",
                    type: "textarea",
                    focus: !0
                }, {
                    name: "time",
                    height: 72,
                    type: "duration",
                    map_to: "auto"
                }],
                project_sections: [{
                    name: "description",
                    height: 70,
                    map_to: "text",
                    type: "textarea",
                    focus: !0
                }, {
                    name: "type",
                    type: "typeselect",
                    map_to: "type"
                }, {
                    name: "time",
                    height: 72,
                    type: "duration",
                    readonly: !0,
                    map_to: "auto"
                }],
                milestone_sections: [{
                    name: "description",
                    height: 70,
                    map_to: "text",
                    type: "textarea",
                    focus: !0
                }, {
                    name: "type",
                    type: "typeselect",
                    map_to: "type"
                }, {
                    name: "time",
                    height: 72,
                    type: "duration",
                    single_date: !0,
                    map_to: "auto"
                }]
            },
            drag_lightbox: !0,
            sort: !1,
            details_on_create: !0,
            details_on_dblclick: !0,
            initial_scroll: !0,
            task_scroll_offset: 100,
            task_height: "full",
            min_column_width: 70,
            min_grid_column_width: 70,
            grid_resizer_column_attribute: "column_index",
            grid_resizer_attribute: "grid_resizer",
            keep_grid_width: !1,
            grid_resize: !1,
            readonly_property: "readonly",
            editable_property: "editable",
            type_renderers: {},
            open_tree_initially: !1
        }), gantt.keys = {
            edit_save: 13,
            edit_cancel: 27
        }, gantt._init_template = function(t, e) {
            var n = this._reg_templates || {};
            this.config[t] && n[t] != this.config[t] && (e && this.templates[t] || (this.templates[t] = this.date.date_to_str(this.config[t]), n[t] = this.config[t])), this._reg_templates = n
        }, gantt._init_templates = function() {
            var t = gantt.locale.labels;
            t.gantt_save_btn = t.icon_save, t.gantt_cancel_btn = t.icon_cancel, t.gantt_delete_btn = t.icon_delete;
            var e = this.date.date_to_str,
                n = this.config;
            gantt._init_template("date_scale", !0), gantt._init_template("date_grid", !0), gantt._init_template("task_date", !0), dhtmlx.mixin(this.templates, {
                xml_date: this.date.str_to_date(n.xml_date, n.server_utc),
                xml_format: e(n.xml_date, n.server_utc),
                api_date: this.date.str_to_date(n.api_date),
                progress_text: function() {
                    return ""
                },
                grid_header_class: function() {
                    return ""
                },
                task_text: function(t, e, n) {
                    return n.text
                },
                task_class: function() {
                    return ""
                },
                grid_row_class: function() {
                    return ""
                },
                task_row_class: function() {
                    return ""
                },
                task_cell_class: function() {
                    return ""
                },
                scale_cell_class: function() {
                    return ""
                },
                scale_row_class: function() {
                    return ""
                },
                grid_indent: function() {
                    return "<div class='gantt_tree_indent'></div>"
                },
                grid_folder: function(t) {
                    return "<div class='gantt_tree_icon gantt_folder_" + (t.$open ? "open" : "closed") + "'></div>"
                },
                grid_file: function() {
                    return "<div class='gantt_tree_icon gantt_file'></div>"
                },
                grid_open: function(t) {
                    return "<div class='gantt_tree_icon gantt_" + (t.$open ? "close" : "open") + "'></div>"
                },
                grid_blank: function() {
                    return "<div class='gantt_tree_icon gantt_blank'></div>"
                },
                task_time: function(t, e) {
                    return gantt.templates.task_date(t) + " - " + gantt.templates.task_date(e)
                },
                time_picker: e(n.time_picker),
                link_class: function() {
                    return ""
                },
                link_description: function(t) {
                    var e = gantt.getTask(t.source),
                        n = gantt.getTask(t.target);
                    return "<b>" + e.text + "</b> &ndash;  <b>" + n.text + "</b>"
                },
                drag_link: function(t, e, n, i) {
                    t = gantt.getTask(t);
                    var a = gantt.locale.labels,
                        s = "<b>" + t.text + "</b> " + (e ? a.link_start : a.link_end) + "<br/>";
                    return n && (n = gantt.getTask(n), s += "<b> " + n.text + "</b> " + (i ? a.link_start : a.link_end) + "<br/>"), s
                },
                drag_link_class: function(t, e, n, i) {
                    var a = "";
                    if (t && n) {
                        var s = gantt.isLinkAllowed(t, n, e, i);
                        a = " " + (s ? "gantt_link_allow" : "gantt_link_deny")
                    }
                    return "gantt_link_tooltip" + a
                }
            }), this.callEvent("onTemplatesReady", [])
        }
    }(), window.jQuery && ! function(t) {
        var e = [];
        t.fn.dhx_gantt = function(n) {
            if (n = n || {}, "string" != typeof n) {
                var i = [];
                return this.each(function() {
                    if (this && this.getAttribute && !this.getAttribute("dhxgantt")) {
                        for (var t in n) "data" != t && (gantt.config[t] = n[t]);
                        gantt.init(this), n.data && gantt.parse(n.data), i.push(gantt)
                    }
                }), 1 === i.length ? i[0] : i
            }
            return e[n] ? e[n].apply(this, []) : void t.error("Method " + n + " does not exist on jQuery.dhx_gantt")
        }
    }(jQuery), window.dhtmlx && (dhtmlx.attaches || (dhtmlx.attaches = {}), dhtmlx.attaches.attachGantt = function(t, e) {
        var n = document.createElement("DIV");
        n.id = "gantt_" + dhtmlx.uid(), n.style.width = "100%", n.style.height = "100%", n.cmp = "grid", document.body.appendChild(n), this.attachObject(n.id);
        var i = this.vs[this.av];
        i.grid = gantt, gantt.init(n.id, t, e), n.firstChild.style.border = "none", i.gridId = n.id, i.gridObj = n;
        var a = "_viewRestore";
        return this.vs[this[a]()].grid
    }), gantt.locale = {
        date: {
            month_full: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            month_short: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
            day_full: ["Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"],
            day_short: ["Dom","Lun","Mar","Mié","Jue","Vie","Sáb"]
        },
        labels: {
            new_task: "Nueva Actividad",
            dhx_cal_today_button: "Hoy",
            day_tab: "Día",
            week_tab: "Semana",
            month_tab: "Mes",
            new_event: "Nuevo evento",
            icon_save: "Guardar",
            icon_cancel: "Cancelar",
            icon_details: "Detalles",
            icon_edit: "Editar",
            icon_delete: "Eliminar",
            confirm_closing: "",
            confirm_deleting: "El evento se borrará definitivamente, ¿continuar?",
            section_description: "Descripción",
            section_time: "Período",
            section_type: "Tipo",
            column_text: "Nombre de Actividad",
            column_start_date: "Inicio",
            column_duration: "Días",
            column_add: "",
            link: "Link",
            confirm_link_deleting: "Sera eliminado",
            link_start: " (inicio)",
            link_end: " (fin)",
            type_task: "Actividad",
            type_project: "Proyecto",
            type_milestone: "Hito",
            minutes: "Minutos",
            hours: "Horas",
            days: "Dias",
            weeks: "Semanas",
            months: "Meses",
            years: "Años"
        }
    }, gantt.skins.skyblue = {
        config: {
            grid_width: 350,
            row_height: 27,
            scale_height: 27,
            task_height: 24,
            link_line_width: 1,
            link_arrow_size: 8,
            lightbox_additional_height: 75
        },
        _second_column_width: 95,
        _third_column_width: 80
    }, gantt.skins.meadow = {
        config: {
            grid_width: 350,
            row_height: 27,
            scale_height: 30,
            task_height: 24,
            link_line_width: 2,
            link_arrow_size: 6,
            lightbox_additional_height: 72
        },
        _second_column_width: 95,
        _third_column_width: 80
    }, gantt.skins.terrace = {
        config: {
            grid_width: 360,
            row_height: 35,
            scale_height: 35,
            task_height: 24,
            link_line_width: 2,
            link_arrow_size: 6,
            lightbox_additional_height: 75
        },
        _second_column_width: 90,
        _third_column_width: 70
    }, gantt.skins.broadway = {
        config: {
            grid_width: 360,
            row_height: 35,
            scale_height: 35,
            task_height: 24,
            link_line_width: 1,
            link_arrow_size: 7,
            lightbox_additional_height: 86
        },
        _second_column_width: 90,
        _third_column_width: 80,
        _lightbox_template: "<div class='gantt_cal_ltitle'><span class='gantt_mark'>&nbsp;</span><span class='gantt_time'></span><span class='gantt_title'></span><div class='gantt_cancel_btn'></div></div><div class='gantt_cal_larea'></div>",
        _config_buttons_left: {},
        _config_buttons_right: {
            gantt_delete_btn: "icon_delete",
            gantt_save_btn: "icon_save"
        }
    }, gantt.config.touch_drag = 500, gantt.config.touch = !0, gantt.config.touch_feedback = !0, gantt._touch_feedback = function() {
        gantt.config.touch_feedback && navigator.vibrate && navigator.vibrate(1)
    }, gantt._init_touch_events = function() {
        "force" != this.config.touch && (this.config.touch = this.config.touch && (-1 != navigator.userAgent.indexOf("Mobile") || -1 != navigator.userAgent.indexOf("iPad") || -1 != navigator.userAgent.indexOf("Android") || -1 != navigator.userAgent.indexOf("Touch"))), this.config.touch && (window.navigator.msPointerEnabled ? this._touch_events(["MSPointerMove", "MSPointerDown", "MSPointerUp"], function(t) {
            return t.pointerType == t.MSPOINTER_TYPE_MOUSE ? null : t
        }, function(t) {
            return !t || t.pointerType == t.MSPOINTER_TYPE_MOUSE
        }) : this._touch_events(["touchmove", "touchstart", "touchend"], function(t) {
            return t.touches && t.touches.length > 1 ? null : t.touches[0] ? {
                target: t.target,
                pageX: t.touches[0].pageX,
                pageY: t.touches[0].pageY,
                clientX: t.touches[0].clientX,
                clientY: t.touches[0].clientY
            } : t
        }, function() {
            return !1
        }))
    }, gantt._touch_events = function(t, e, n) {
        function i(t) {
            return t && t.preventDefault && t.preventDefault(), (t || event).cancelBubble = !0, !1
        }

        function a(t) {
            var e = gantt._task_area_pulls,
                n = gantt.getTask(t);
            if (n && gantt.isTaskVisible(t))
                for (var i in e)
                    if (n = e[i][t], n && n.getAttribute("task_id") && n.getAttribute("task_id") == t) {
                        var a = n.cloneNode(!0);
                        return h = n, e[i][t] = a, n.style.display = "none", a.className += " gantt_drag_move ", n.parentNode.appendChild(a), a
                    }
        }
        var s, r = 0,
            o = !1,
            d = !1,
            l = null,
            _ = null,
            h = null;
        this._gantt_touch_event_ready || (this._gantt_touch_event_ready = 1, dhtmlxEvent(gantt.$container, t[0], function(t) {
            if (!n(t) && o) {
                _ && clearTimeout(_);
                var a = e(t);
                if (gantt._tasks_dnd.drag.id || gantt._tasks_dnd.drag.start_drag) return gantt._tasks_dnd.on_mouse_move(a), t.preventDefault && t.preventDefault(), t.cancelBubble = !0, !1;
                if (a && l) {
                    var h = l.pageX - a.pageX,
                        g = l.pageY - a.pageY;
                    !d && (Math.abs(h) > 5 || Math.abs(g) > 5) && (gantt._touch_scroll_active = d = !0, r = 0, s = gantt.getScrollState()), d && gantt.scrollTo(s.x + h, s.y + g)
                }
                return i(t)
            }
        })), dhtmlxEvent(this.$container, "contextmenu", function(t) {
            return o ? i(t) : void 0
        }), dhtmlxEvent(this.$container, t[1], function(t) {
            if (!n(t)) {
                if (t.touches && t.touches.length > 1) return void(o = !1);
                if (o = !0, l = e(t), l && r) {
                    var s = new Date;
                    500 > s - r ? (gantt._on_dblclick(l), i(t)) : r = s
                } else r = new Date;
                _ = setTimeout(function() {
                    var t = gantt.locate(l);
                    t && -1 == l.target.className.indexOf("gantt_link_point") && (gantt._tasks_dnd.on_mouse_down(l), gantt._tasks_dnd._start_dnd(l), gantt._touch_drag = !0, a(t), gantt.refreshTask(t), gantt._touch_feedback()), _ = null
                }, gantt.config.touch_drag)
            }
        }), dhtmlxEvent(this.$container, t[2], function(t) {
            if (!n(t)) {
                _ && clearTimeout(_), gantt._touch_drag = !1, o = !1;
                var i = e(t);
                gantt._tasks_dnd.on_mouse_up(i), h && (gantt.refreshTask(gantt.locate(h)), h.parentNode.removeChild(h), gantt._touch_feedback()), gantt._touch_scroll_active = o = d = !1, h = null
            }
        })
    };
//# sourceMappingURL=sources/dhtmlxgantt.js.map