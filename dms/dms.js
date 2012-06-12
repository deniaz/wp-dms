(function($) {
    
    var collector = {
        init: function() {
            var that = this;
            
            $('#dms-submit-config').live('hover', function() {
                var string = that.collect();
                $('#dms_map').val(string);
            });
            
            $('#dms-submit-config').live('click', function(e) {
               check = confirm("Are you sure to change these settings?");
               if (check === false) {
                   e.preventDefault();
               }
            });
        },
        collect: function() {
            var string = "";
            $('.dms-collect-key').each(function(){
                string += $(this).val() + "=";
                
                var select = $(this).siblings('select').get(0);
                string += $(select).val() + '&';
            });
            
            return string;
        }
    };
    
    var controls = {
        init: function() {
            var that = this;
            $('.dms-delete-row').live('click', function() {
                that.removeRow($(this));
            });
            
            $('.dms-add-row').live('click', function(e) {
                e.preventDefault();
                that.addRow($(this));
            });
        },
        removeRow: function(btn) {
            $(btn).closest('tr').remove();
        },
        addRow: function(btn) {
            var tr = $('#dms-map').find('tr').get(1),
                clone = $(tr).clone();
            console.log(clone);
            $(clone).find('input').each(function(){ $(this).val(''); });
            var select = $(clone).find('a.chzn-single').first();
            select.addClass('chzn-default').addClass('chzn-single-with-drop').find('span').text($('.chzn-done').first().attr('data-placeholder'));
            $(clone).removeAttr('id');
            $('#dms-add-new-tr').before(clone);
            
            
        }
    };
    
    var chosen = {
        init: function() {
            $('select.dms').chosen();
        }
    };
        
    $(document).ready(function() {
        collector.init();
        controls.init();
        chosen.init();
    });
})(jQuery);