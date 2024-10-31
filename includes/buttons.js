(function() {
    tinymce.create('tinymce.plugins.sly', {
        init : function(ed, url) {
            ed.addCommand('slywidget', function() {
                var q = prompt("Introduce el nombre de la serie, película, programa o documental:");
                if (q !== null) {
					ed.execCommand('mceInsertContent', 0, '[sly-widget q="' + q + '" size="0" border="0" /]');
                }      
            });
            ed.addButton('slywidget', {
                title : 'Series.ly Widget',
                cmd : 'slywidget',
                image : url + '/sly.png'
            });
        },
        createControl : function(n, cm) {
            return null;
        },
        getInfo : function() {
            return {
                    longname : 'Series.ly Widget',
                    author : 'ProsoLAB',
                    authorurl : 'http://www.prosoparidas.com/lab/',
                    infourl : 'http://www.prosoparidas.com/lab/sly-widget/',
                    version : "1.0"
            };
        }
    });
    tinymce.PluginManager.add('sly', tinymce.plugins.sly);
})();