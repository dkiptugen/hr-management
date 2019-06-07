        
        <script src="<?=base_url();?>assets/js/app.js"></script>
        <script src="<?=base_url();?>assets/js/functions.js"></script>

        <script>
            /*var token_validity_check_url = "< ?=site_url('api/token_is_valid');?>";
            console.log(getCookie("tsa_token"));
            function setCookie(cname, cvalue) {
                var d = new Date();
                d.setTime(d.getTime() + (5*60*60*1000));//30 minutes
                var expires = "expires="+ d.toUTCString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
            } 
        
            function getCookie(cname){
                var name = cname + "=";
                var decodedCookie = decodeURIComponent(document.cookie);
                var ca = decodedCookie.split(';');
                for(var i = 0; i <ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' '){
                        c = c.substring(1);
                    }
            
                    if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                    }
                }
                return "";
            }*/

            $(document).ready(function() {
                $('#datatables-basic').DataTable({
                    responsive: true,
                });
                // Datatables with Buttons
                var datatablesButtons = $('#datatables-buttons').DataTable({
                    lengthChange: !1,
                    buttons: ["copy", "print"],
                    responsive: true,
					order: [[ 0, "asc" ]]
                });
                datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
				
				var datatablesButtonsDesc = $('#datatables-buttons-desc').DataTable({
                    lengthChange: !1,
                    buttons: ["copy", "print"],
                    responsive: true,
					order: [[ 0, "desc" ], [ 1, "desc" ]]
                });
                datatablesButtonsDesc.buttons().container().appendTo("#datatables-buttons-desc_wrapper .col-md-6:eq(0)");
            });
        </script>
    </body>
</html>