<template>
  <h1 class="text-xl font-semibold text-gray-600 uppercase">
    Cadastro de cidades
  </h1>
  <p class="text-base text-gray-600 uppercase">{{ citiesCount }}</p>
  <form ref="searchForm" class="mb-4 w-full">
    <div class="my-4 flex rounded-xl shadow-sm">
      <div class="relative flex items-stretch flex-grow focus-within:z-10">
        <div
          class="
            absolute
            inset-y-0
            left-0
            pl-3
            flex
            items-center
            pointer-events-none
          "
        >
          <svg
            class="h-5 w-5 text-gray-400"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            fill="currentColor"
          >
            <path
              fill-rule="evenodd"
              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
              clip-rule="evenodd"
            />
          </svg>
        </div>
        <input
          v-model="searchTerm"
          type="search"
          name="search"
          id="search"
          class="
            bg-white
            h-14
            px-5
            pl-10
            text-sm
            rounded-xl
            block
            focus:outline-none
            w-full
          "
          placeholder="Cidade"
        />
      </div>
    </div>
  </form>
  <div class="divide-y divide-gray-300 mb-12">
    <div v-for="city in cities" :key="`city-${city.id}`">
      <list-item
        :active="city.id === cityActive"
        :onActiveCity="setActiveCity"
        :onDeleteCity="() => deleteCity(city)"
        :city="city"
      />
    </div>
  </div>
  <create-button title="Adicionar estado" :onClicked="$emit('createCity')" />
</template>

<script>
import CreateButton from '../shared/CreateButton.vue'
import ListItem from './ListItem'

export default {
  name: 'CityList',
  components: { ListItem, CreateButton },
  emits: ['deleteCity', 'searchCity', 'setCity', 'createCity'],
  props: {
    cities: {
      type: Array,
      required: true,
    },
  },
  data: () => ({
    searchTerm: '',
    cityActive: null,
  }),
  computed: {
    citiesCount() {
      const count = this.cities.length
      if (count === 0 || count > 1) return `${count} cidades cadastradas`
      return `${count} cidade cadastrada`
    },
  },
  watch: {
    async searchTerm(val) {
      if (this.timeout) clearTimeout(this.timeout)
      this.timeout = setTimeout(() => {
        this.$emit('searchCity', val)
      }, 500)
    },
  },
  methods: {
    deleteCity(city) {
      this.$emit('deleteCity', city)
    },
    setActiveCity(id) {
      if (this.cityActive === id) {
        this.cityActive = null
        this.$emit('setCity', null)
      } else {
        this.cityActive = id
        this.$emit('setCity', id)
      }
    },
  },
}
</script>
