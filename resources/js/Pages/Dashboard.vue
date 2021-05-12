<template>
  <layout>
    <state-list
      :states="stateList"
      @searchStates="(search) => onSubmit(search)"
    />
  </layout>
</template>

<script>
import Layout from '../shared/Layout'
import StateList from '../components/states/List'
import StatesService from '../services/states-service'

export default {
  name: 'Dashboard',
  props: {
    states: Object,
    search: String,
  },
  data: () => ({
    searchStates: [],
  }),
  computed: {
    stateList() {
      return this.searchStates.data || this.states.data
    },
  },
  components: { Layout, StateList },
  methods: {
    async onSubmit(search) {
      try {
        const { states } = (await StatesService.search({ search })).data
        this.searchStates = states
      } catch (error) {
        console.log(error)
      }
    },
  },
}
</script>

<style lang="scss" scoped></style>
