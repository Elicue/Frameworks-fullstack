<template>
  <div class="bg-gray-200 hover:bg-gray-300 transition-all duration-300 flex flex-row rounded-lg p-4 justify-between">
    <p>{{title}}</p>
    <img class="w-5 h-auto" src="/storage/tracks/images/arrow-r.svg" alt="">
  </div>
</template>
<script>
export default {
  name: 'More',

  props: {
    title: String,
  },
}
</script>