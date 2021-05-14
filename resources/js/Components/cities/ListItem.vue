<template>
  <div class="flex my-4 cursor-pointer on-hover">
    <div
      @click="$emit('activeCity', city.id)"
      class="flex flex-grow items-center py-2"
    >
      <div>
        <span class="text-xl block font-extrabold text-gray-800 px-4">
          {{ city.name }}
        </span>
        <span class="text-md block text-gray-800 px-4">
          {{ touristSpotsCount }}
        </span>
      </div>
    </div>
    <div class="flex flex-none justify-center py-2">
      <button
        @click="$emit('deleteCity')"
        class="focus:outline-none outline-none self-center show"
      >
        <div class="text-red-600 hover:text-red-700">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="22"
            height="22"
            fill="currentColor"
            class="bi bi-trash"
            viewBox="0 0 16 16"
          >
            <path
              d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"
            />
            <path
              fill-rule="evenodd"
              d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"
            />
          </svg>
        </div>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ItemList',
  emits: ['activeCity', 'deleteCity'],
  props: {
    city: {
      type: Object,
      required: true,
    },
    active: {
      type: Boolean,
      required: false,
    },
  },
  computed: {
    touristSpotsCount() {
      const count = this.city.tourist_spots_count
      if (count && count > 1) return `${count} pontos turísticos cadastrados`
      else if (count && count === 1)
        return `${count} ponto turístico cadastrado cadastrado`
      return 'Nenhum ponto turístico cadastrado'
    },
  },
}
</script>

<style lang="css" scoped>
.on-hover .show {
  visibility: hidden;
  opacity: 0;
  transition: 0.3s;
}
.on-hover:hover .show {
  visibility: visible;
  opacity: 1;
  transition: 0.3s;
}
</style>
