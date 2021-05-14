<template>
  <layout class="h-screen">
    <div class="flex flex-col lg:flex-row">
      <div class="flex-1 mx-8">
        <states-list
          :states="statesList"
          :onSearchState="searchState"
          :onDeleteState="openDeleteStateDialog"
          :onSetState="setState"
          :onCreateState="openCreateStateDialog"
        />
      </div>
      <div v-if="citiesList.length" class="flex-1 mx-8">
        <cities-list
          :cities="citiesList"
          :onSearchState="searchState"
          :onDeleteState="openDeleteStateDialog"
          :onSetState="setState"
          :onCreateState="openCreateStateDialog"
        />
      </div>
    </div>
    <delete-state-dialog
      v-if="deleteTargetState !== null"
      :state="deleteTargetState"
      :onClose="(deleteTargetState = null)"
    />
  </layout>
</template>

<script>
import Layout from '../components/shared/Layout'
import StatesList from '../components/states/List'
import CitiesList from '../components/cities/List'
import DeleteStateDialog from '../components/states/DeleteDialog'
import StatesService from '../services/states-service'
import CitiesService from '../services/cities-service'

export default {
  name: 'Dashboard',
  props: {
    states: Object,
    search: String,
  },
  components: { Layout, CitiesList, StatesList, DeleteStateDialog },
  data: () => ({
    searchStates: [],
    cities: [],
    deleteTargetState: null,
    searchTargetStateId: null,
  }),
  computed: {
    statesList() {
      return this.searchStates.data || this.states.data
    },
    citiesList() {
      return this.cities?.data || []
    },
  },
  methods: {
    async searchState(search = '') {
      try {
        const { states } = (await StatesService.search({ search })).data
        this.searchStates = states
      } catch (error) {
        console.log(error)
      }
    },
    openCreateStateDialog() {
      this.createStateDialog != this.createStateDialog
    },
    openDeleteStateDialog(state) {
      this.deleteTargetState = state
    },
    async deleteState(id) {
      try {
        const { states } = (await StatesService.delete({ id })).data
        this.searchStates = states
      } catch (error) {
        console.log(error)
      }
    },
    async searchCities(state_id, search = '') {
      try {
        const { cities } = (await CitiesService.search({ state_id, search }))
          .data
        this.cities = cities
      } catch (error) {
        console.log(error)
      }
    },
    setState(id) {
      this.searchTargetStateId = id
      if (id) this.searchCities(id)
      else this.cities = []
    },
  },
}
</script>
