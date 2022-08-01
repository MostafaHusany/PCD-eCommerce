/* SCEditor v3.1.1 | (C) 2017, Sam Clarke | sceditor.com/license */

!function(m){"use strict";var b=m.dom,t=m.utils,w=b.css,i=b.attr,y=b.is,E=b.removeAttr,n=b.convertElement,r=t.extend,a=t.each,S=t.isEmptyObject,l=m.command.get,e={bold:{txtExec:["<strong>","</strong>"]},italic:{txtExec:["<em>","</em>"]},underline:{txtExec:['<span style="text-decoration:underline;">',"</span>"]},strike:{txtExec:['<span style="text-decoration:line-through;">',"</span>"]},subscript:{txtExec:["<sub>","</sub>"]},superscript:{txtExec:["<sup>","</sup>"]},left:{txtExec:['<div style="text-align:left;">',"</div>"]},center:{txtExec:['<div style="text-align:center;">',"</div>"]},right:{txtExec:['<div style="text-align:right;">',"</div>"]},justify:{txtExec:['<div style="text-align:justify;">',"</div>"]},font:{txtExec:function(t){var e=this;l("font")._dropDown(e,t,function(t){e.insertText('<span style="font-family:'+t+';">',"</span>")})}},size:{txtExec:function(t){var e=this;l("size")._dropDown(e,t,function(t){e.insertText('<span style="font-size:'+t+';">',"</span>")})}},color:{txtExec:function(t){var e=this;l("color")._dropDown(e,t,function(t){e.insertText('<span style="color:'+t+';">',"</span>")})}},bulletlist:{txtExec:["<ul><li>","</li></ul>"]},orderedlist:{txtExec:["<ol><li>","</li></ol>"]},table:{txtExec:["<table><tr><td>","</td></tr></table>"]},horizontalrule:{txtExec:["<hr />"]},code:{txtExec:["<code>","</code>"]},image:{txtExec:function(t,e){var o=this;l("image")._dropDown(o,t,e,function(t,e,n){var i="";e&&(i+=' width="'+e+'"'),n&&(i+=' height="'+n+'"'),o.insertText("<img"+i+' src="'+t+'" />')})}},email:{txtExec:function(t,n){var i=this;l("email")._dropDown(i,t,function(t,e){i.insertText('<a href="mailto:'+t+'">'+(e||n||t)+"</a>")})}},link:{txtExec:function(t,n){var i=this;l("link")._dropDown(i,t,function(t,e){i.insertText('<a href="'+t+'">'+(e||n||t)+"</a>")})}},quote:{txtExec:["<blockquote>","</blockquote>"]},youtube:{txtExec:function(t){var n=this;l("youtube")._dropDown(n,t,function(t,e){n.insertText('<iframe width="560" height="315" src="https://www.youtube.com/embed/{id}?wmode=opaque&start='+e+'" data-youtube-id="'+t+'" frameborder="0" allowfullscreen></iframe>')})}},rtl:{txtExec:['<div stlye="direction:rtl;">',"</div>"]},ltr:{txtExec:['<div stlye="direction:ltr;">',"</div>"]}};function T(){var o=this,n={},h={};function t(t,e,n){var g,i,o,r,a,l,s,c,u,d,f,v=n.createElement("div");return v.innerHTML=e,w(v,"visibility","hidden"),n.body.appendChild(v),e=v,b.traverse(e,function(t){var e=t.nodeName.toLowerCase();x("*",t),x(e,t)},!0),g=v,b.traverse(g,function(t){var e,n=t.nodeName.toLowerCase(),i=t.parentNode,o=t.nodeType,r=!b.isInline(t),a=t.previousSibling,l=t.nextSibling,s="iframe"!==n&&function t(e,n){var i=e.childNodes,o=e.nodeName.toLowerCase(),r=e.nodeValue,a=i.length,l=T.allowedEmptyTags||[];if(n&&"br"===o)return!0;if(y(e,".sceditor-ignore"))return!0;if(-1<l.indexOf(o)||"td"===o||!b.canHaveChildren(e))return!1;if(r&&/\S|\u00A0/.test(r))return!1;for(;a--;)if(!t(i[a],n&&!e.previousSibling&&!e.nextSibling))return!1;if(e.getBoundingClientRect&&(e.className||e.hasAttributes("style")))return!(r=e.getBoundingClientRect()).width||!r.height;return!0}(t,i===g&&(!a&&!l)&&"br"!==n),c=t.ownerDocument,u=T.allowedTags,d=t.firstChild,f=T.disallowedTags;if(3!==o&&(4===o?n="!cdata":"!"!==n&&8!==o||(n="!comment"),1===o&&y(t,".sceditor-nlf")&&(!d||1===t.childNodes.length&&/br/i.test(d.nodeName)?s=!0:(t.classList.remove("sceditor-nlf"),t.className||E(t,"class"))),s?e=!0:u&&u.length?e=u.indexOf(n)<0:f&&f.length&&(e=-1<f.indexOf(n)),e)){if(!s){for(r&&a&&b.isInline(a)&&i.insertBefore(c.createTextNode(" "),t);t.firstChild;)i.insertBefore(t.firstChild,l);r&&l&&b.isInline(l)&&i.insertBefore(c.createTextNode(" "),l)}i.removeChild(t)}},!0),e=v,u=(c=T.allowedAttribs)&&!S(c),f=(d=T.disallowedAttribs)&&!S(d),h={},b.traverse(e,function(t){if(t.attributes&&(i=t.nodeName.toLowerCase(),a=t.attributes.length))for(h[i]||(h[i]=u?p(c["*"],c[i]):p(d["*"],d[i]));a--;)o=t.attributes[a],r=o.name,l=h[i][r],s=!1,u?s=null!==l&&(!Array.isArray(l)||l.indexOf(o.value)<0):f&&(s=null===l||Array.isArray(l)&&-1<l.indexOf(o.value)),s&&t.removeAttribute(r)}),t||function(t){var e;b.removeWhiteSpace(t);for(var n,i=t.firstChild;i;)n=i.nextSibling,b.isInline(i)&&!y(i,".sceditor-ignore")?(e||(e=t.ownerDocument.createElement("p"),i.parentNode.insertBefore(e,i)),e.appendChild(i)):e=null,i=n}(v),t=(new m.XHTMLSerializer).serialize(v,!0),n.body.removeChild(v),t}function x(t,i){n[t]&&n[t].forEach(function(n){n.tags[t]?a(n.tags[t],function(t,e){i.getAttributeNode&&(!(t=i.getAttributeNode(t))||e&&e.indexOf(t.value)<0||n.conv.call(o,i))}):n.conv&&n.conv.call(o,i)})}function p(t,e){var n={};return t&&(n=r({},n,t)),e&&a(e,function(t,e){Array.isArray(e)?n[t]=(n[t]||[]).concat(e):n[t]||(n[t]=null)}),n}o.init=function(){S(T.converters||{})||a(T.converters,function(t,e){a(e.tags,function(t){n[t]||(n[t]=[]),n[t].push(e)})}),this.commands=r(!0,{},e,this.commands)},o.toSource=t.bind(null,!1),o.fragmentToSource=t.bind(null,!0)}m.XHTMLSerializer=function(){var i={indentStr:"\t"},o=[],d=0;function f(t){var e={"&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;"," ":"&nbsp;"};return t?t.replace(/[&<>"\xa0]/g,function(t){return e[t]||t}):""}function g(e,t){switch(e.nodeType){case 1:!function(t,e){var n,i,o,r=t.nodeName.toLowerCase(),a="iframe"===r,l=t.attributes.length,s=t.firstChild,c=e||/pre(?:\-wrap)?$/i.test(w(t,"whiteSpace")),u=!t.firstChild&&!b.canHaveChildren(t)&&!a;if(!y(t,".sceditor-ignore")){for(v("<"+r,!e&&h(t));l--;)i=t.attributes[l],o=i.value,v(" "+i.name.toLowerCase()+'="'+f(o)+'"',!1);for(v(u?" />":">",!1),a||(n=s);n;)d++,g(n,c),n=n.nextSibling,d--;u||v("</"+r+">",!c&&!a&&h(t)&&s&&h(s))}}(e,t);break;case 3:i=t,o=(n=e).nodeValue,!void((o=!i?o.replace(/[^\S\u00A0]+/g," "):o)&&v(f(o),!i&&h(n)));break;case 4:v("<![CDATA["+f(e.nodeValue)+"]]>");break;case 8:v("\x3c!-- "+f(e.nodeValue)+" --\x3e");break;case 9:case 11:!function(){for(var t=e.firstChild;t;)g(t),t=t.nextSibling}()}var n,i,o}function v(t,e){var n=d;if(!1!==e)for(o.length&&o.push("\n");n--;)o.push(i.indentStr);o.push(t)}function h(t){var e=t.previousSibling;return 1!==t.nodeType&&e?!b.isInline(e):!e&&!b.isInline(t.parentNode)||!b.isInline(t)}this.serialize=function(t,e){if(o=[],e)for(t=t.firstChild;t;)g(t),t=t.nextSibling;else g(t);return o.join("")}},T.converters=[{tags:{"*":{width:null}},conv:function(t){w(t,"width",i(t,"width")),E(t,"width")}},{tags:{"*":{height:null}},conv:function(t){w(t,"height",i(t,"height")),E(t,"height")}},{tags:{li:{value:null}},conv:function(t){E(t,"value")}},{tags:{"*":{text:null}},conv:function(t){w(t,"color",i(t,"text")),E(t,"text")}},{tags:{"*":{color:null}},conv:function(t){w(t,"color",i(t,"color")),E(t,"color")}},{tags:{"*":{face:null}},conv:function(t){w(t,"fontFamily",i(t,"face")),E(t,"face")}},{tags:{"*":{align:null}},conv:function(t){w(t,"textAlign",i(t,"align")),E(t,"align")}},{tags:{"*":{border:null}},conv:function(t){w(t,"borderWidth",i(t,"border")),E(t,"border")}},{tags:{applet:{name:null},img:{name:null},layer:{name:null},map:{name:null},object:{name:null},param:{name:null}},conv:function(t){i(t,"id")||i(t,"id",i(t,"name")),E(t,"name")}},{tags:{"*":{vspace:null}},conv:function(t){w(t,"marginTop",+i(t,"vspace")),w(t,"marginBottom",+i(t,"vspace")),E(t,"vspace")}},{tags:{"*":{hspace:null}},conv:function(t){w(t,"marginLeft",+i(t,"hspace")),w(t,"marginRight",+i(t,"hspace")),E(t,"hspace")}},{tags:{hr:{noshade:null}},conv:function(t){w(t,"borderStyle","solid"),E(t,"noshade")}},{tags:{"*":{nowrap:null}},conv:function(t){w(t,"whiteSpace","nowrap"),E(t,"nowrap")}},{tags:{big:null},conv:function(t){w(n(t,"span"),"fontSize","larger")}},{tags:{small:null},conv:function(t){w(n(t,"span"),"fontSize","smaller")}},{tags:{b:null},conv:function(t){n(t,"strong")}},{tags:{u:null},conv:function(t){w(n(t,"span"),"textDecoration","underline")}},{tags:{s:null,strike:null},conv:function(t){w(n(t,"span"),"textDecoration","line-through")}},{tags:{dir:null},conv:function(t){n(t,"ul")}},{tags:{center:null},conv:function(t){w(n(t,"div"),"textAlign","center")}},{tags:{font:{size:null}},conv:function(t){w(t,"fontSize",w(t,"fontSize")),E(t,"size")}},{tags:{font:null},conv:function(t){n(t,"span")}},{tags:{"*":{type:["_moz"]}},conv:function(t){E(t,"type")}},{tags:{"*":{_moz_dirty:null}},conv:function(t){E(t,"_moz_dirty")}},{tags:{"*":{_moz_editor_bogus_node:null}},conv:function(t){t.parentNode.removeChild(t)}},{tags:{"*":{"data-sce-target":null}},conv:function(t){var e=i(t,"rel")||"",n=i(t,"data-sce-target");"_blank"===n&&y(t,"a")&&(/(^|\s)noopener(\s|$)/.test(e)||i(t,"rel","noopener"+(e?" "+e:"")),i(t,"target",n)),E(t,"data-sce-target")}},{tags:{code:null},conv:function(t){for(var e=t.getElementsByTagName("div");t=e[0];)t.style.display="block",n(t,"span")}}],T.allowedAttribs={},T.disallowedAttribs={},T.allowedTags=[],T.disallowedTags=[],T.allowedEmptyTags=[],m.formats.xhtml=T}(sceditor);