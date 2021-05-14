<template>
  <div
    data-placeholder
    class="h-4 my-12 relative bg-gray-300 overflow-hidden w-full"
  ></div>
</template>

<script>
export default {
  name: 'TextPlaceholder',
}
</script>
<style scoped>
[data-placeholder]::after {
  content: ' ';
  box-shadow: 0 0 25px 10px #fff;
  position: absolute;
  top: 0;
  left: -100%;
  height: 100%;
  animation: load 1s infinite;
}
@keyframes load {
  0% {
    left: -100%;
  }
  100% {
    left: 150%;
  }
}
</style>
