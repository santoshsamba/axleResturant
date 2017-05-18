<template>
	<div class="row">
		<div class="tableNo">
	  		<ul>
		  		<li>
		  			<div class="circleBase type1">
						<div class="tableInside">
							<div style="padding:0;margin:0;font-size:24px;">1</div> <br />
						</div>
					</div>
		  		</li>
		  		<li><div class="circleBase type1">
						<div class="tableInside">
							<div style="padding:0;margin:0;font-size:24px;">2</div> <br />
						</div>
					</div>
				</li>
		  		<li>
		  			<div class="circleBase type1">
						<div class="tableInside">
							<div style="padding:0;margin:0;font-size:24px;">3</div> <br />
						</div>
					</div>

		  		</li>
	  		</ul>
	  		<router-view></router-view>
  		</div>
  	</div>
</template>

<script>
	export default{
		data(){
			return{

			}
		}
	}
</script>