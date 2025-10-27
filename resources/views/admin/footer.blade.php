</div> <!-- End wrapper from header -->
</div> <!-- End app from header -->

@if(session('success'))
<script>
	toastr.success("{{ session('success') }}");
</script>
@endif

@if(session('error'))
<script>
	toastr.error("{{ session('error') }}");
</script>
@endif

@if($errors->any())
<script>
	@foreach($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
</script>
@endif

<!-- Mobile Footer Menu -->
<div class="footer w3-white d-lg-none">
	<div class="w3-bar w3-white">
		<center>
			<table>
				<tr>
					<td style="font-size:9pt;text-align:center;">
						<a class="" href="{{ route('admin.dashboard') }}" style="margin-right:10px">
							<img src="{{ asset('user/icon/dashboard.png') }}"
								style="width:20px;height:20px"><br>Dashboard
						</a>
					</td>
					<td style="font-size:9pt;text-align:center;">
						<a class="" href="{{ route('admin.transactions.index') }}" style="margin-right:10px">
							<img src="{{ asset('user/icon/Copy Trader.png') }}"
								style="width:20px;height:20px"><br>Transactions
						</a>
					</td>
					<td style="font-size:9pt;text-align:center;">
						<a class="" href="{{ route('admin.users.index') }}" style="margin-right:10px">
							<img src="{{ asset('user/icon/history.png') }}" style="width:20px;height:20px"><br>Users
						</a>
					</td>
					<td style="font-size:9pt;text-align:center;">
						<a class="" href="{{ route('admin.investments.index') }}" style="margin-right:10px">
							<img src="{{ asset('user/icon/exchange.png') }}"
								style="width:20px;height:20px"><br>Investments
						</a>
					</td>
					<td style="font-size:8pt;text-align:center;">
						<a style="font-size:9pt;text-align:center;" class="navbar-toggler sidenav-toggler"
							data-toggle="collapse" data-target="collapse">
							<img src="{{ asset('user/icon/more.png') }}" style="width:20px;height:20px;"><br>Menu
						</a>
					</td>
				</tr>
			</table>
		</center>
	</div>
</div>

<!--   Core JS Files   -->
<script src="{{ asset('user/account/dash/js/core/popper.min.js') }}"></script>
<script src="{{ asset('user/account/dash/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('user/account/dash/js/customs.js') }}"></script>

<!-- jQuery UI -->
<script src="{{ asset('user/account/dash/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('user/account/dash/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('user/account/dash/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

<!-- jQuery Sparkline -->
<script src="{{ asset('user/account/dash/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Datatables -->
<script type="text/javascript"
	src="https://cdn.datatables.net/v/bs4/dt-1.10.21/af-2.3.5/b-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/r-2.2.5/datatables.min.js">
</script>

<!-- Atlantis JS -->
<script src="{{ asset('user/account/dash/js/atlantis.min.js') }}"></script>
<script src="{{ asset('user/account/dash/js/atlantis.js') }}"></script>

<!-- Google Translate -->
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>
<script type="text/javascript">
	function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'en',
                    layout: google.translate.TranslateElement.InlineLayout.SIMPLE
                }, 'google_translate_element');
            }
</script>

<!-- Security Script -->
<script type="text/javascript">
	var badWords = [ 
                '<!--Start of Tawk.to Script-->',
                '<script type="text/javascript">', 
                '<!--End of Tawk.to Script-->'
            ];
            
            $(':input').on('blur', function(){
                var value = $(this).val();
                $.each(badWords, function(idx, word){
                    value = value.replace(word, '');
                });
                $(this).val(value);
            });
</script>

<!-- DataTables Initialization -->
<script>
	$(document).ready(function() {
                // Initialize DataTables
                $('.datatable').DataTable({
                    "order": [[0, 'desc']],
                    "dom": 'Bfrtip',
                    "buttons": [
                        'copy', 'csv', 'print', 'excel', 'pdf'
                    ],
                    "responsive": true,
                    "language": {
                        "search": "_INPUT_",
                        "searchPlaceholder": "Search..."
                    }
                });

                // Style DataTables elements
                $(".dataTables_length select").addClass("bg-light text-dark");
                $(".dataTables_filter input").addClass("bg-light text-dark");
                
                // Auto-dismiss alerts after 5 seconds
                setTimeout(function() {
                    $('.alert').fadeOut('slow');
                }, 5000);

                // Confirm before delete
                $('.delete-form').on('submit', function(e) {
                    if (!confirm('Are you sure you want to delete this item?')) {
                        e.preventDefault();
                    }
                });
            });
</script>

<!-- Additional Custom Scripts -->
<script>
	// Toggle sidebar on mobile
            $('.toggle-sidebar').click(function() {
                $('.sidebar').toggleClass('active');
            });

            // Active menu item highlighting
            $(document).ready(function() {
                var current = location.pathname;
                $('.nav-item a').each(function() {
                    var $this = $(this);
                    if ($this.attr('href') === current) {
                        $this.closest('.nav-item').addClass('active');
                    }
                });
            });

            // Form submission loading states
            $('form').on('submit', function() {
                var btn = $(this).find('button[type="submit"]');
                btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Processing...');
            });
</script>
</body>

</html>