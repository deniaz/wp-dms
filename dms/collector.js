(function($) {
    
    var collector = {
        init: function() {
            var that = this;
            
            $('#php-kill').change(function() {
                $('#dms_exit_php').click();
            });
            
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
            var clone = $('#dms-new-domain').clone();
            clone.find('input').each(function(){ $(this).val(''); });
            clone.removeAttr('id');
            
            $('#dms-new-domain').after(clone);
        }
    };
        
    $(document).ready(function() {
        collector.init();
        controls.init();
    });
})(jQuery);