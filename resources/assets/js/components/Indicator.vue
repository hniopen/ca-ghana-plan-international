<template>
  <div class="chart">
    <h4>{{indicatorData['title']}}</h4>
    <div>
      <ul class="nav nav-tabs" id="indicatorTabs">
        <li v-for="(chartData, i) in indicatorData['visualisations']" :key="i" role="presentation" v-bind:class="{active: !i}"><a v-bind:href="'#'+slugify(chartData['title'])+'-'+slugify(indicatorData['title'])" role="tab" data-toggle="tab">{{chartData['title']}}</a></li>
      </ul>
      <div class="tab-content">
        <div v-for="(chartData, i) in indicatorData['visualisations']" :key="i" role="tabpanel" v-bind:class="{'tab-pane': true, active: !i}" v-bind:id="slugify(chartData['title'])+'-'+slugify(indicatorData['title'])">
          <chart v-bind:colours="chartData['colours']" v-bind:show_legend="chartData['show_legend']" v-bind:additionalTooltipDataTest="chartData['additionalTooltipDataTest']" v-bind:additionalTooltipData="chartData['additionalTooltipData']" v-bind:targets="chartData['targets']" v-bind:dataTooltipSuffix="chartData['dataTooltipSuffix']" v-bind:labelText="chartData['labelText']" v-bind:description="chartData['description']" v-bind:chartData="chartData['data']"></chart>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Vue from 'vue'
  import Chart from './Chart.vue'

  export default {
    name: 'indicator',
    components: {
      Chart 
    },

    props: [
      'indicatorData'
    ],
  }
</script>
