<!--Footer-->
  <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn fixed-bottom">

   
    <!--Copyright-->
    <div class="footer-copyright py-3">
      &copy; <?php echo date('Y');?> Copyright:
      <a href="#"> OPS </a> by Emile NIYOGUSHIMWA
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>

  <!-- Charts -->
  <script>
  function graph(){
  	const xhr = new XMLHttpRequest();
    let dummyData = [];
	
    xhr.onreadystatechange = function(){
    	if(xhr.status===200){
    		let v = xhr.responseText.split(',');
    		let b = v.map(str => parseInt(str));
    		dummyData = b;

    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["Jan", "Feb", "March", "April", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"],
        datasets: [{
          label: '# of permissions',
          data: dummyData,
          backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)',
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });

    	}
    }

    xhr.open("GET","graph.php",true);
    xhr.send();
  }
  


  function graph2(){
  	const xhr = new XMLHttpRequest();
    let dummyData = [];
	
    xhr.onreadystatechange = function(){
    	if(xhr.status===200){
    		let v = xhr.responseText.split(',');
    		let b = v.map(str => parseInt(str));
    		dummyData = b;

    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["Jan", "Feb", "March", "April", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"],
        datasets: [{
          label: '# of permissions',
          data: dummyData,
          backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)',
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });

    	}
    }

    xhr.open("GET","graph2.php",true);
    xhr.send();
  }
  </script>

	<script>
		function changePassword(id){
			
			let data = document.getElementById(id);
			let label1 = document.getElementById("form1Check");
			let label2 = document.getElementById("form2Check");
			let label3 = document.getElementById("form3Check");
			let counter = document.getElementById("get");
			
			if(id==="form1"){
				const http = new XMLHttpRequest();
				
			    http.onreadystatechange = function(){
			    	if(http.status===200){
			    		
						if(data.value != http.responseText && data.value != ""){
							label1.innerHTML = "invalid password";
							label1.style.color="red";
							label1.style.fontSize= "13px";
							document.getElementById("submit").disabled=true;
						}
						else if(data.value === http.responseText && data.value != "") {
						
							label1.innerHTML = "<i class='fa fa-check'></i>";
							label1.style.color="green";
							label1.style.fontSize= "13px";
							counter.innerHTML=1;
							
						}
						else{
							label1.innerHTML = "";
						}
						
			    	}
				}
			    
			    http.open("GET","CheckPassword.php",true);
		    	http.send();
			}
			
			 if(id==="form2"){
				document.getElementById("form3").value="";
				label3.innerHTML = "";
				
				label2.innerHTML = `<b>Password should be strong</b>
					<ul style='font-size:12px'>
						<li id='1'>At least 6 characters</li>
						<li id='2'>At least one capital letter</li>
						<li id='3'>At least one small letter</li>
						<li id='4'>At least one number</li>
					</ul>`;

				let caps = /[A-Z]/;
				let caps2 = /[a-z]/;
				let i=0;
				
				if(data.value.length>=6){
					document.getElementById("1").style.display="none";
					i+=1;
				}
				if(caps.test(data.value)){
					document.getElementById("2").style.display="none";
					i+=1;
				}
				if(caps2.test(data.value)){
					document.getElementById("3").style.display="none";
					i+=1;
				}
				if(data.value.includes('0')||data.value.includes('1')||data.value.includes('2')||data.value.includes('3')){
					document.getElementById("4").style.display="none";
					i+=1;
				}
				if(i>=4){
					label2.innerHTML = `<i class='fa fa-check'></i>`;
					label2.style.color="green";
					label2.style.fontSize= "13px";
					counter.innerHTML= Number(counter.innerHTML)+1;
				}
				else{
					document.getElementById("submit").disabled=true;
				}
			}
			 
			 if(id==="form3"){
				 
				if(data.value === document.getElementById("form2").value)
				{
					
					
					label3.innerHTML = `<i class='fa fa-check'></i>`;
					label3.style.color="green";
					label3.style.fontSize= "13px";
					counter.innerHTML= Number(counter.innerHTML)+1;
				}
				else{
					label3.innerHTML = "Password is not matching!";
					label3.style.color="red";
					label3.style.fontSize= "13px";
					document.getElementById("submit").disabled=true;
				}
					
				}
			 if(counter.innerHTML>=3){
				 document.getElementById("submit").disabled=false;
			 }
		}
		
	</script>
	<script>
		function checkDate(id){
			

			let data = document.getElementById(id);
			let label1 = document.getElementById("form1Check");
			let label2 = document.getElementById("form2Check");
			let label3 = document.getElementById("form3Check");
			let counter = document.getElementById("get");
			

			let date = new Date();
			let sel = new Date(data.value);
			
			let today = date.toISOString().split('T')[0];
			
			let selected = sel.toISOString().split('T')[0];
			

			if(id==="form1"){
				document.getElementById("form2").value="";
				label2.innerHTML = "";
				
				if(selected >= today){
					label1.innerHTML = "";
					counter.innerHTML=1;
				}
				else{
					label1.innerHTML = "You can't select past date!";
					label1.style.color="red";
					label1.style.fontSize= "13px";
					document.getElementById("submit").disabled=true;
					data.focus();
				}
			}

			if(id==="form2"){
				
				let prev = new Date(document.getElementById("form1").value);
								
				let previous = prev.toISOString().split('T')[0];;
				
				
				if(selected >= previous){
					
					label2.innerHTML = "";
					counter.innerHTML = Number(counter.innerHTML)+1;
				}
				else{
					label2.innerHTML = "Choose the date on and after leave date";
					label2.style.color="red";
					label2.style.fontSize= "13px";
					document.getElementById("submit").disabled=true;
				}
			}

			if(counter.innerHTML >= 2){
				document.getElementById("submit").disabled=false;
			}
			else{
				document.getElementById("submit").disabled=true;
			}
			
			
		}
	</script>
	<script>
		function focusdReason(){
			document.getElementById('lbl3').style.backgroundColor='white';
			document.getElementById('lbl3').style.color='grey';
		}
	</script>
	
	<script>
		function getPermissions(page){

			let prev = document.getElementById("prev");
			let next = document.getElementById("next");
			
			let btn = document.getElementById("btn");
			let of = document.getElementById("of");
			let link = document.getElementById("link");

			let input = document.getElementById("input");

			
			if(Number(btn.innerHTML) > 1){
				prev.style.pointerEvents = "auto"; 
				prev.style.color = "#444";
				prev.style.cursor = "pointer"; 
				prev.style.decoration = "auto";
			}
			else if(Number(btn.innerHTML)<=1){
				
				prev.style.pointerEvents = "none"; 
				prev.style.color = "#aaa";
				prev.style.cursor = "default"; 
				prev.style.decoration = "none";
			}
			

			if(page==="next"){
				
				prev.style.pointerEvents = "auto"; 
				prev.style.color = "#444";
				prev.style.cursor = "pointer"; 
				prev.style.decoration = "auto";
				
				if(Number(btn.innerHTML) < Number(of.innerHTML)){
					
					btn.innerHTML = Number(btn.innerHTML) + 1;
					input.value = Number(btn.innerHTML);
				}
				else{
					input.value = Number(of.innerHTML);
					btn.innerHTML = Number(of.innerHTML);
				}
			}
			else if(page==="previous"){
				if(Number(btn.innerHTML) > 1){
					
					btn.innerHTML = Number(btn.innerHTML) - 1;
					input.value = Number(btn.innerHTML);
				}
			}
			else if(page==="typing"){
				if(input.value.length <= 1){
					btn.innerHTML = 2;
				}

				if(Number(input.value) >= Number(of.innerHTML)){
					input.value = Number(of.innerHTML);
					btn.innerHTML = Number(of.innerHTML);
				}
				else{
					if(input.value.length === 0){
						btn.innerHTML = 1;

					}
					else{
						btn.innerHTML = input.value;
						//input.value = btn.innerHTML;
					}
				}
			}
			else if(page==="pages"){
				input.style.display = "inline";
				input.value = Number(btn.innerHTML);
				btn.style.display = "none";
				input.focus(); 
			}
			
			let pages = (Number(btn.innerHTML)-1) * 5; 
			
			
			let body = document.getElementById("tableBody");
			
			const http = new XMLHttpRequest();
			
		    http.onreadystatechange = function(){
		    	if(http.status===200){
		    		body.innerHTML = http.responseText;
		    	}
		    	
		    }
		    http.open("GET","GetPermissions.php?page="+pages, true);
	    	http.send();
		}
		


		function getPermissions2(page){

			let prev = document.getElementById("prev");
			let next = document.getElementById("next");
			
			let btn = document.getElementById("btn");
			let of = document.getElementById("of");
			let link = document.getElementById("link");

			let input = document.getElementById("input");

			
			if(Number(btn.innerHTML) > 1){
				prev.style.pointerEvents = "auto"; 
				prev.style.color = "#444";
				prev.style.cursor = "pointer"; 
				prev.style.decoration = "auto";
			}
			else if(Number(btn.innerHTML)<=1){
				
				prev.style.pointerEvents = "none"; 
				prev.style.color = "#aaa";
				prev.style.cursor = "default"; 
				prev.style.decoration = "none";
			}
			

			if(page==="next"){
				
				prev.style.pointerEvents = "auto"; 
				prev.style.color = "#444";
				prev.style.cursor = "pointer"; 
				prev.style.decoration = "auto";
				
				if(Number(btn.innerHTML) < Number(of.innerHTML)){
					
					btn.innerHTML = Number(btn.innerHTML) + 1;
					input.value = Number(btn.innerHTML);
				}
				else{
					input.value = Number(of.innerHTML);
					btn.innerHTML = Number(of.innerHTML);
				}
			}
			else if(page==="previous"){
				if(Number(btn.innerHTML) > 1){
					
					btn.innerHTML = Number(btn.innerHTML) - 1;
					input.value = Number(btn.innerHTML);
				}
			}
			else if(page==="typing"){
				if(input.value.length <= 1){
					btn.innerHTML = 2;
				}

				if(Number(input.value) >= Number(of.innerHTML)){
					input.value = Number(of.innerHTML);
					btn.innerHTML = Number(of.innerHTML);
				}
				else{
					if(input.value.length === 0){
						btn.innerHTML = 1;

					}
					else{
						btn.innerHTML = input.value;
						//input.value = btn.innerHTML;
					}
				}
			}
			else if(page==="pages"){
				input.style.display = "inline";
				input.value = Number(btn.innerHTML);
				btn.style.display = "none";
				input.focus(); 
			}
			
			let pages = (Number(btn.innerHTML)-1) * 5; 
			
			
			let body = document.getElementById("tableBody");
			
			const http = new XMLHttpRequest();
			
		    http.onreadystatechange = function(){
		    	if(http.status===200){
		    		body.innerHTML = http.responseText;
		    	}
		    	
		    }
		    http.open("GET","GetPermissions2.php?page="+pages, true);
	    	http.send();
		}
		
	</script>
	<script>
	function deletePermission(){
		let id = document.getElementById("del").value;
		
		let xml = new XMLHttpRequest();
		
		xml.onreadystatechange = function(){
			if(xml.status==200){
				window.location.href = "permissions.php";
			}
		}
		
		xml.open("GET", "DeletePermission.php?id="+id, true);
		xml.send();
		
	}
	</script>
	
	<script>
		function editPermission(id){
			

			let data = document.getElementById(id);
			let label1 = document.getElementById("form1Check1");
			let label2 = document.getElementById("form2Check1");
			let label3 = document.getElementById("form3Check1");
			let counter = document.getElementById("get1");
			

			let date = new Date();
			let sel = new Date(data.value);
			
			let today = date.toISOString().split('T')[0];
			
			let selected = sel.toISOString().split('T')[0];
			

			if(id==="edit1"){
				document.getElementById("edit2").value="";
				label2.innerHTML = "";
				
				if(selected >= today){
					label1.innerHTML = "";
					counter.innerHTML=1;
				}
				else{
					label1.innerHTML = "You can't select past date!";
					label1.style.color="red";
					label1.style.fontSize= "13px";
					document.getElementById("submit").disabled=true;
					data.focus();
				}
			}

			if(id==="edit2"){
				
				let prev = new Date(document.getElementById("edit1").value);
								
				let previous = prev.toISOString().split('T')[0];;
				
				
				if(selected >= previous){
					
					label2.innerHTML = "";
					counter.innerHTML = Number(counter.innerHTML)+1;
				}
				else{
					label2.innerHTML = "Choose the date on and after leave date";
					label2.style.color="red";
					label2.style.fontSize= "13px";
					document.getElementById("submit2").disabled=true;
				}
			}

			if(counter.innerHTML >= 2){
				document.getElementById("submit2").disabled=false;
			}
			else{
				document.getElementById("submit2").disabled=true;
			}
			
			
		}
	</script>