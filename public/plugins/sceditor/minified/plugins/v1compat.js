/* SCEditor v3.1.1 | (C) 2017, Sam Clarke | sceditor.com/license */

!function(t,r){"use strict";var e=t.plugins;function n(c){if(c._scePatched)return c;function t(){for(var t=[],e=0;e<arguments.length;e++){var n=arguments[e];n&&n.nodeType?t.push(r(n)):t.push(n)}return c.apply(this,t)}return t._scePatched=!0,t}function c(t){if(t._scePatched)return t;function e(){return r(t.apply(this,arguments))}return e._scePatched=!0,e}var o,a=t.command.set;t.command.set=function(t,e){return e&&"function"==typeof e.exec&&(e.exec=n(e.exec)),e&&"function"==typeof e.txtExec&&(e.txtExec=n(e.txtExec)),a.call(this,t,e)},e.bbcode&&(o=e.bbcode.bbcode.set,e.bbcode.bbcode.set=function(t,e){return e&&"function"==typeof e.format&&(e.format=n(e.format)),o.call(this,t,e)});var i=t.create;t.create=function(t,e){i.call(this,t,e),t&&t._sceditor&&((t=t._sceditor).getBody=c(t.getBody),t.getContentAreaContainer=c(t.getContentAreaContainer))}}(sceditor,jQuery);