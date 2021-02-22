$(document).ready(function() {
	// alert("Zdravo!!!");
	autor();
	izdavac();
	proizvod();
	function autor(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {autor:1},
			success: function(data){
				$("#get_autor").html(data);
			}
		})
	}

	function izdavac(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {izdavac:1},
			success: function(data){
				$("#get_izdavac").html(data);
			}
		})
	}

	function proizvod(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {getProizvod:1},
			success: function(data){
				$("#get_proizvod").html(data);
			}
		})
	}

	$("body").delegate(".autor","click",function(event){
		event.preventDefault();
		var aid=$(this).attr('aid');
		// alert(aid);
		
			$.ajax({
			url : "action.php",
			method : "POST",
			data : {get_selected_Autor:1,autor_id:aid},
			success: function(data){
				$("#get_proizvod").html(data);
			}
		})
		
	})

	$("body").delegate(".selectIzdavac","click",function(event){
		event.preventDefault();
		var iid=$(this).attr('iid');
		// alert(cid);
		
			$.ajax({
			url : "action.php",
			method : "POST",
			data : {selectIzdavac:1,izdavac_id:iid},
			success: function(data){
				$("#get_proizvod").html(data);
			}
		})
		
	})

	$("#search_btn").click(function(){
		var tag=$("#search").val();
		if (tag!="") {
			$.ajax({
			url : "action.php",
			method : "POST",
			data : {search:1,tag:tag},
			success: function(data){
				$("#get_proizvod").html(data);
			}
			})
		}
	})

	$("#signup_button").click(function(event){
		// alert("Zdravo");
		event.preventDefault();
		$.ajax({
			url : "register.php",
			method : "POST",
			data : $("form").serialize(),
			success: function(data){
				$("#signup_msg").html(data);			}
		})
	})

	$("#login").click(function(event){
		event.preventDefault();
		var email = $("#email").val();
		var pass = $("#password").val();
		$.ajax({
			url	:	"login.php",
			method:	"POST",
			data	:	{userLogin:1,userEmail:email,userPassword:pass},
			success	: function(data){
				if (data== "true") {
					window.location.href="profile.php";
				}
			}
		})
	})

	cart_count();
	// za ubacivanje proizvoda u cart u bazi
	$("body").delegate("#knjiga","click",function(event){
		event.preventDefault();
		// alert("zdravo proizvod je kliknut");
		var k_id=$(this).attr('kid');
		// alert(k_id);
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {dodavanjeKnjige:1,knjigaId:k_id},
			success : function(data){
				// alert(data);
				$("#product_msg").html(data);
				cart_count();
			}
		})
	})

	cart_container();
	//***za broj proizvoda u korpi na profile.php
	function cart_container(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {get_cart_product:1},
			success : function(data){
				$("#cart_product").html(data);
			}
		})
		cart_count();
	}

	function cart_count(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {cart_count:1},
			success : function(data){
				$(".badge").html(data);
			}
		})
	}


	// za ubacivanje proizvoda u cart na navigaciji u profile.php
	$("#cart_container").click(function(event){
		event.preventDefault();
		// alert("Klik na cart navigacija!!!");
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {get_cart_product:1},
			success : function(data){
				$("#cart_product").html(data);
			}
		})
	})

	// u cart.php cartcheckout 
	cart_checkout();
	function cart_checkout(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {cart_checkout:1},
			success : function(data){
				$("#cart_checkout").html(data);
			}
		})
	}

	//cart.php za Quantity deo za mnozenje i brisanje i update-ovanje
	$("body").delegate(".qty","keyup",function(){ //.qty naziv klase u actionu je class="form-control qtn,price ili total"
		// alert("klik na kolicinu ");
		// alert("keyup na kolicinu tj na bilo koji dodatak karaktera reaguje!!!");
		var pid=$(this).attr("pid");//***Bitno=>da se taj atribut odnosi na klasu koja poziva tu funkciju a to je klasa "qty"!!!
		
		// alert(pid); //vraca ID Proizvoda
		var qty=$("#qty-"+pid).val();
		var price=$("#price-"+pid).val();
		var total=qty * price;
		// alert(total);
		$("#total-"+pid).val(total);
	})

	//cart.php delete
	$("body").delegate(".remove","click",function(event){
		event.preventDefault();
		var pid=$(this).attr("remove_id");
		var oid=$(this).attr("order_id");
		// alert(pid);
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {removeFromCart:1,removeId:pid, orderId:oid},
			success : function(data){
				// alert(data);
				$("#cart_msg").html(data);
				cart_checkout();//da bi nestala slika odmah da ne moramo da refreshujemo
				
			}
		})
	})

	//cart.php update
	$("body").delegate(".update","click",function(event){ //.update odnosi se na klasu update
		event.preventDefault();
		var pid=$(this).attr("update_id");
		// alert(pid);
		var qty=$("#qty-"+pid).val();
		var price=$("#price-"+pid).val();
		var total=$("#total-"+pid).val();
		
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {updateProdactFromCart:1,updateId:pid,qty:qty,price:price,total:total}, //***ovo su podaci kojima pristupamo preko POST-a!!!
			success : function(data){
				$("#cart_msg").html(data);
				cart_checkout();//zbog ovoga ne mora da se refreshuje
				
			}
		})
	})

	page();
	function page(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {str:1},
			success :function(data){
				// alert(data);
				$("#obelezavanje_strana").html(data); //u profile.php
			}
		})
	}

	$("body").delegate("#strana","click",function(){ //#strana je id u klasi action tj predstavlja jedan <li></li>
		// alert("klikuto je na neki broj strane");
		var bs=$(this).attr("strana"); //naziv atribura koji hocemo da uzmemo iz <li></li> je strana
		// alert(bs); //kliknuto je na odredjen broj strane
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {getProizvod:1,setStrana:1,stranaBroj:bs},
			success : function(data){
				$("#get_proizvod").html(data);
			}
		})

	})

	$("#prikazSveKnjige_btn").click(function(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {getProizvod:1},
			success : function(data){
				$("#get_proizvod").html(data);
			}
		})
	})

	

	


})