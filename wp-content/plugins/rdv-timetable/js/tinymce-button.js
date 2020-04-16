
(function() {

    tinymce.create('tinymce.plugins.sched_button', {
        init : function(ed, url) {
            var sched_button_properties = {
                title : 'Responsive Timetable',
                //image : url+'/../images/icon.jpg',
               // icon: 'ytp-icon-video-alt3',
               text    : ' Timetable',
                onclick : function() {
                    tb_show("Insert Timetable", url+"/../lib/tinymce/popup.php?");
                    tinymce.DOM.setStyle('TB_window', 'height', '400');
                    tinymce.DOM.setStyle('TB_ajaxContent', 'margin', '0 auto');
                }
            };

            sched_button_properties.icon = 'sched-icon';
            //sched_button_properties.image = url+'/../images/icon.jpg';
            
            ed.addButton('sched_button', sched_button_properties);
        },
        createControl : function(n, cm) {
            return null;
        },
        getInfo : function() {
            return {
                longname : "Insert Timetable",
                author : 'Rik de Vos',
                authorurl : 'http://rikdevos.com/',
                infourl : 'http://rikdevos.com/',
                version : "1.0"
            };
        }
    });
    tinymce.PluginManager.add('sched_button', tinymce.plugins.sched_button);

})();



