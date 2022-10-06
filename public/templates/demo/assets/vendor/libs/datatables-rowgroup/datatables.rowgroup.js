/*! For license information please see datatables.rowgroup.js.LICENSE.txt */
!function(){var t={7304:function(t,r,e){var n,o;n=[e(19567),e(59117)],o=function(t){return function(t,r,e,n){"use strict";var o=t.fn.dataTable,a=function(r,e){if(!o.versionCheck||!o.versionCheck("1.10.8"))throw"RowGroup requires DataTables 1.10.8 or newer";this.c=t.extend(!0,{},o.defaults.rowGroup,a.defaults,e),this.s={dt:new o.Api(r)},this.dom={};var n=this.s.dt.settings()[0],i=n.rowGroup;if(i)return i;n.rowGroup=this,this._constructor()};return t.extend(a.prototype,{dataSrc:function(r){if(r===n)return this.c.dataSrc;var e=this.s.dt;return this.c.dataSrc=r,t(e.table().node()).triggerHandler("rowgroup-datasrc.dt",[e,r]),this},disable:function(){return this.c.enable=!1,this},enable:function(t){return!1===t?this.disable():(this.c.enable=!0,this)},enabled:function(){return this.c.enable},_constructor:function(){var t=this,r=this.s.dt,e=r.settings()[0];r.on("draw.dtrg",(function(r,n){t.c.enable&&e===n&&t._draw()})),r.on("column-visibility.dt.dtrg responsive-resize.dt.dtrg",(function(){t._adjustColspan()})),r.on("destroy",(function(){r.off(".dtrg")}))},_adjustColspan:function(){t("tr."+this.c.className,this.s.dt.table().body()).find("td:visible").attr("colspan",this._colspan())},_colspan:function(){return this.s.dt.columns().visible().reduce((function(t,r){return t+r}),0)},_draw:function(){var t=this.s.dt,r=this._group(0,t.rows({page:"current"}).indexes());this._groupDisplay(0,r)},_group:function(t,r){for(var e,a=Array.isArray(this.c.dataSrc)?this.c.dataSrc:[this.c.dataSrc],i=o.ext.oApi._fnGetObjectDataFn(a[t]),s=this.s.dt,u=[],d=this,c=0,l=r.length;c<l;c++){var p,f=r[c];null!==(p=i(s.row(f).data()))&&p!==n||(p=d.c.emptyDataGroup),e!==n&&p===e||(u.push({dataPoint:p,rows:[]}),e=p),u[u.length-1].rows.push(f)}if(a[t+1]!==n)for(c=0,l=u.length;c<l;c++)u[c].children=this._group(t+1,u[c].rows);return u},_groupDisplay:function(t,r){for(var e,n=this.s.dt,o=0,a=r.length;o<a;o++){var i,s=r[o],u=s.dataPoint,d=s.rows;this.c.startRender&&(e=this.c.startRender.call(this,n.rows(d),u,t),(i=this._rowWrap(e,this.c.startClassName,t))&&i.insertBefore(n.row(d[0]).node())),this.c.endRender&&(e=this.c.endRender.call(this,n.rows(d),u,t),(i=this._rowWrap(e,this.c.endClassName,t))&&i.insertAfter(n.row(d[d.length-1]).node())),s.children&&this._groupDisplay(t+1,s.children)}},_rowWrap:function(r,e,o){return null!==r&&""!==r||(r=this.c.emptyDataGroup),r===n||null===r?null:("object"==typeof r&&r.nodeName&&"tr"===r.nodeName.toLowerCase()?t(r):r instanceof t&&r.length&&"tr"===r[0].nodeName.toLowerCase()?r:t("<tr/>").append(t("<td/>").attr("colspan",this._colspan()).append(r))).addClass(this.c.className).addClass(e).addClass("dtrg-level-"+o)}}),a.defaults={className:"dtrg-group",dataSrc:0,emptyDataGroup:"No group",enable:!0,endClassName:"dtrg-end",endRender:null,startClassName:"dtrg-start",startRender:function(t,r){return r}},a.version="1.1.4",t.fn.dataTable.RowGroup=a,t.fn.DataTable.RowGroup=a,o.Api.register("rowGroup()",(function(){return this})),o.Api.register("rowGroup().disable()",(function(){return this.iterator("table",(function(t){t.rowGroup&&t.rowGroup.enable(!1)}))})),o.Api.register("rowGroup().enable()",(function(t){return this.iterator("table",(function(r){r.rowGroup&&r.rowGroup.enable(t===n||t)}))})),o.Api.register("rowGroup().enabled()",(function(){var t=this.context;return!(!t.length||!t[0].rowGroup)&&t[0].rowGroup.enabled()})),o.Api.register("rowGroup().dataSrc()",(function(t){return t===n?this.context[0].rowGroup.dataSrc():this.iterator("table",(function(r){r.rowGroup&&r.rowGroup.dataSrc(t)}))})),t(e).on("preInit.dt.dtrg",(function(r,e,n){if("dt"===r.namespace){var i=e.oInit.rowGroup,s=o.defaults.rowGroup;if(i||s){var u=t.extend({},s,i);!1!==i&&new a(e,u)}}})),a}(t,window,document)}.apply(r,n),void 0===o||(t.exports=o)},59117:function(t){"use strict";t.exports=window["$.fn.dataTable"]},19567:function(t){"use strict";t.exports=window.jQuery}},r={};function e(n){var o=r[n];if(void 0!==o)return o.exports;var a=r[n]={exports:{}};return t[n](a,a.exports,e),a.exports}e.n=function(t){var r=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(r,{a:r}),r},e.d=function(t,r){for(var n in r)e.o(r,n)&&!e.o(t,n)&&Object.defineProperty(t,n,{enumerable:!0,get:r[n]})},e.o=function(t,r){return Object.prototype.hasOwnProperty.call(t,r)},e.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})};var n={};!function(){"use strict";e.r(n);e(7304)}();var o=window;for(var a in n)o[a]=n[a];n.__esModule&&Object.defineProperty(o,"__esModule",{value:!0})}();