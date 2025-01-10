<template>
  <div class="bg-red-400">Welcome {{ fullname }}</div>

</template>

<script>
export default {
    props:['fullname'],
    created(){
        console.log(this);
    }
}
</script>

<style>

</style>