<template>
    <section class="content-header">
        <h1>
        	{{ headName }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
</template>
<script>
	export default{
		props: ['headName'],
		data(){
			return{
			}
		}
	}
</script>