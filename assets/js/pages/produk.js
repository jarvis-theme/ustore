define(['jquery','jq_ui','bootstrap','jq_colorbox'], function($)
{
	return new function()
	{
		var self = this;
		var URL = window.location.protocol + "//" + window.location.host;
		self.run = function()
		{
			close_dialog();
			deletecartdialog();
			addToCartButton();
			plugin_trustklik();

			/******** Color box **********/
			$('.colorbox').colorbox({
				overlayClose: true,
				opacity: 0.5,
				rel: "colorbox"
			});			
		};		

		var addToCartButton = function(){
			$('#addorder').submit(function(){
				// alert('add to cart');
				var pathArray = window.location.pathname.split( '/' );
				var id = pathArray[pathArray.length-1];	
				var qty = $('#addorder input[name="qty"]').val();
				var opsi = '';
				var namaopsi = '';
				valid = true;
				var n = ~~Number(qty);
				status = String(n) === qty && n > 0;

				opsi = $('#addorder select').val();
				if(opsi==''){
					$('#addorder select').focus();
					noty({"text":'Pilih salah satu opsi produk.',"layout":"center","type":'error','speed': 100});		
					valid = false;
				}
				if(status=='false'){
					noty({"text":'Quantity salah.',"layout":"center","type":'error','speed': 100});		
					valid=false;
				}
				if(valid==true)
				{
					//$('#shoppingcartplace').focus();
					$("#cart_dialog").dialog({
						title : 'Terima Kasih Sudah Berbelanja di Toko Kami.',
						width: 'auto', // overcomes width:'auto' and maxWidth bug
						height: 'auto',
						minWidth : 500,
						maxWidth: 500,
						modal: true,
						fluid: true, //new option
						resizable: false,
						//closeOnEscape: false,
						draggable: false,
						open: function(event, ui){ 
							$(".ui-dialog-titlebar").hide();
							h = parseInt($("#cart_dialog").css('height'))/2-8;
							w = parseInt($("#cart_dialog").css('width'))/2-8;
							$("#cart_dialog").find('img').css({'margin-left':w+'px','margin-top':h+'px'});

							//disable scroll
							$('html, body').css({
								'overflow': 'hidden'
							})

							fluidDialog();
							$.ajax({
								url: URL+'/cart',
								type: 'post',
								data: {produkId:id,namaopsi:namaopsi,opsi:opsi,qty:qty}
							}).done(function(data){
								if(data=='stok'){
									noty({"text":'Maaf, Stok tidak mencukupi.',"layout":"center","type":'error','speed': 100});
									$( "#cart_dialog" ).dialog('close');		
								}else if(data=='opsi'){
									noty({"text":'Maaf, Opsi tidak ditemukan.',"layout":"center","type":'error','speed': 100});		
									$( "#cart_dialog" ).dialog('close');		
								}
								else if(data['url']) 
								{
									//alert('hahahaa');
									//console.log('hihii');
									$( "#cart_dialog" ).dialog('close');  
									window.location = data.url + "/checkout";
								}
								else{
									//noty({"text":'Selamat, Item sudah tertambah ke cart.',"layout":"center","type":'success','speed': 100});		
									$('#shoppingcartplace').html(data['cart']);
									$('.ui-dialog-content').html(data['detail']); 								
								}
								//$('#addorder input[type="submit"]').button('reset');
								//$('.add_cart').button('reset');

							}).done(function(){
								fluidDialog();
							}).error(function(){
								noty({"text":'Opps, something error. please try again.',"layout":"center","type":'error','speed': 100});		
								$( "#cart_dialog" ).dialog('close');
							});
						},
						beforeClose: function( event, ui ) {
							$('.ui-dialog-content').html('<img src="'+URL+'/img/spinner-mini.gif" style="position:relative;margin:100px">');
							$('html, body').css({
								'overflow': 'auto'
							})
						}
					});
					//$('#addorder input[type="submit"]').button('loading');
					//$('.add_cart').button('loading');					
				}
				return false;
			});
		};

		var fluidDialog = function() {
			var $visible = $(".ui-dialog:visible");
			// each open dialog
			var $this = $visible;
			if($("#cart_dialog").dialog('option','maxWidth') && $("#cart_dialog").dialog('option','width')){
				$this.css("max-width",$("#cart_dialog").dialog('option','maxWidth'));
				//reposition dialog
				var wWidth = $(window).width();
				// check window width against dialog width
				if (wWidth < $("#cart_dialog").dialog('option','maxWidth') + 100) {
					// keep dialog from filling entire screen
					$this.css("width", "90%");
				}
				//reposition dialog
				$("#cart_dialog").dialog('option','position',$("#cart_dialog").dialog("option","position"));              
				$("#cart_dialog").dialog("option","position",$("#cart_dialog").dialog("option","position"));
			}

			if ($("#cart_dialog").dialog("option","fluid")) {
				// namespace window resize
				$(window).on("resize.responsive", function () {
					var wWidth = $(window).width();
					// check window width against dialog width
					if (wWidth < $("#cart_dialog").dialog('option','maxWidth') + 50) {
						// keep dialog from filling entire screen
						$this.css("width", "90%");	                    
					}
					//reposition dialog
					$("#cart_dialog").dialog('option','position',$( "#cart_dialog" ).dialog( "option", "position" ));
				});
			}
		};
		
		var close_dialog = function(){
			$(document).on('click', '.left .button-dialog', function(){
				$('#cart_dialog').dialog('close');
			});
		};

		var deletecartdialog = function(){
			$(document).on('click','.remove',function(){
				var delete_id = $(".remove a[href*=deletecartdialog]").attr("href");
				id = delete_id.match(/'([^']+)'/)[1];
				
				if(window.confirm("Hapus dari cart?")){
					$.ajax({
						url: URL+'/cart/delete/'+id,		    
						type: 'get'
					}).done(function(data){
						$('#shoppingcartplace').html(data['cart']);
						$( "#cart_dialog" ).dialog('close');	
					}).done(function(){
						noty({"text":'Produk dalam keranjang berhasil di hapus.',"layout":"center","type":'success','speed': 100});	
					}).error(function(){
						noty({"text":'Opps, terjadi kesalahan.',"layout":"center","type":'error','speed': 100});		
					});	
				}
			});
		};

		var plugin_trustklik = function(){
			window.trustklik_id = "MioercsF235J4rvIsJaRviS";
			/* * * DONT EDIT BELOW THIS LINE * * */
			var tk = document.createElement("script"); tk.type = "text/javascript"; tk.async = true;
			tk.src = "http://www.trustklik.com/areviews/js/si-embed-insidediv.js";
			(document.getElementsByTagName("body")[0] || document.getElementsByTagName("head")[0]).appendChild(tk);
		};

	};
});