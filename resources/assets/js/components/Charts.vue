<template>
  <main>

    <div class="row" v-for="(indicatorData, i) in _.chunk(chartsData, 2)" :key="i">
      <div class="col-xs-12 col-sm-6">
        <div class="panel panel-default panel-indicator">
          <div class="panel-body">
            <div class="content">
              <indicator v-bind:indicatorData="indicatorData[0]"></indicator>
            </div>
          </div>
        </div>
      </div>
      <div v-if="indicatorData[1]" class="col-xs-12 col-sm-6">
        <div class="panel panel-default panel-indicator">
          <div class="panel-body">
            <div class="content">
              <indicator v-bind:indicatorData="indicatorData[1]"></indicator>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
  import Vue from 'vue'
  import { mapState } from 'vuex'

  import Indicator from './Indicator.vue'

  export default {
    name: 'charts',
    components: {
      Indicator,
    },

    computed: mapState([
      'chartsData'
    ]) 
  }
</script>
