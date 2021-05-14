<template>
  <h1 class="text-xl font-semibold text-gray-600 uppercase">
    Cadastro de estados
  </h1>
  <p class="text-base text-gray-600 uppercase">{{ statesCount }}</p>
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
          placeholder="Estado"
        />
      </div>
    </div>
  </form>
  <div class="mb-12">
    <div v-for="state in states" :key="`state-${state.id}`">
      <list-item
        :active="state.id === stateActive"
        :onActiveState="setActiveState"
        :onDeleteState="() => deleteState(state)"
        :state="state"
      />
    </div>
  </div>
  <create-button title="Adicionar estado" :onClicked="$emit('createState')" />
</template>

<script>
import CreateButton from '../shared/CreateButton.vue'
import ListItem from './ListItem'

export default {
  name: 'State List',
  components: { ListItem, CreateButton },
  emits: ['deleteState', 'searchState', 'setState', 'createState'],
  props: {
    states: {
      type: Array,
      required: true,
    },
  },
  data: () => ({
    searchTerm: '',
    stateActive: null,
  }),
  computed: {
    statesCount() {
      const count = this.states.length
      if (count === 0 || count > 1) return `${count} estados cadastrados`
      return `${count} estado cadastrado`
    },
  },
  watch: {
    async searchTerm(val) {
      if (this.timeout) clearTimeout(this.timeout)
      this.timeout = setTimeout(() => {
        this.$emit('searchState', val)
      }, 500)
    },
  },
  methods: {
    deleteState(state) {
      this.$emit('deleteState', state)
    },
    setActiveState(id) {
      if (this.stateActive === id) {
        this.stateActive = null
        this.$emit('setState', null)
      } else {
        this.stateActive = id
        this.$emit('setState', id)
      }
    },
  },
}
</script>
