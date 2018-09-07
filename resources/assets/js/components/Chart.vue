<template>
  <div>
    <div v-show="currentChartData.length" class="chart">
      <div class="row">
        <div class="col-xs-12">
          <h5 class="visual-description">{{description}}</h5>
        </div>
      </div>
      <vue-c3 :handler="handler"></vue-c3>
    </div>
    <div v-show="!currentChartData.length" class="chart">
      <div class="row">
        <div class="col-xs-12">
          <h5 class="visual-description">{{description}}</h5>
        </div>
      </div>
      {{"No data"}}
    </div>
  </div>
</template>

<script>
  import Vue from 'vue'
  import VueC3 from 'vue-c3'
  import * as d3 from 'd3'
  import moment from 'moment'
  import { mapState } from 'vuex'

  export default {
    name: 'chart',
    components: {
      VueC3
    },

    props: {
      chartData: {
        type: Array,
        required: true
      },
      colours: {
        type: Object,
        required: true
      },
      description: {
        type: String,
        required: true
      },
      labelText: {
        type: String,
        required: true
      },
      dataTooltipSuffix: {
        type: String,
        required: true
      },
      show_legend: {
        default: true
      },
      targets: {
        type: Array,
        required: true
      },
      additionalTooltipDataTest: {
        type: Function,
      },
    },
    data () {
      return {
        handler: new Vue(),
        currentChartData: this.chartData 
      }
    },

    mounted () {
      const options = {
        data: {
          x: 'x',
          xFormat: '%Y%m', 
          columns: this.currentTimePeriodData(),
          empty: {
            label: {
              text: "No data for the chosen period"
            }
          },
          color: function (colour, d)  { 
            var id = d.id ? d.id : d;
            return this.colours[id];
          }.bind(this),
        },
        padding: {
          right: 20,
        },
        axis: {
            x: {
                type: 'timeseries',
                tick: {
                    format: '%Y-%b'
                },
            },
            y: {
                min: 0,
                tick: {
                  format: d3.format('d')
                },
                label: {
                    text: this.labelText,
                    position: 'outer-middle'
                },
                padding : {
                  bottom : 0,
                }
            }
        },
        tooltip: {
            format: {
                value: function (value, ratio, id, index) {
                    if(this.additionalTooltipDataTest && this.additionalTooltipDataTest(id)) {
                      return value;
                    } else {
                      return value+this.dataTooltipSuffix;
                    }
                }.bind(this)
            },
            order: function (t1, t2) {
                var valt1 = t1;
                var valt2 = t2;
                if(t1) {
                  if(t1.id.includes("Target")) {
                      valt1 = 0;
                  } else if(t1.id == "boys") {
                      valt1 = -1;
                  } else if(t1.id == "girls") {
                      valt1 = -1;
                  } else { 
                      valt1 = t1.value;
                  }
                }
                if(t2) {
                  if(t2.id.includes("Target")) {
                      valt2 = 0;
                  } else if(t2.id == "boys") {
                      valt2 = -1;
                  } else if(t2.id == "girls") {
                      valt2 = -1;
                  } else { 
                      valt2 = t2.value;
                  }
                }

                return valt2 - valt1;
            }
        },
        legend: {
          show: (Array.isArray(this.show_legend) ? false : this.show_legend)
        }
      }

      this.handler.$emit('init', options)
      if(Array.isArray(this.show_legend)) {
        this.handler.$emit('dispatch', (chart) => chart.legend.show(this.show_legend));
      }
    },
    updated () {
      var existingNoDataElement = this.$el.querySelector('.custom-no-data-message');
      if(existingNoDataElement) {
        existingNoDataElement.remove();
      }
      this.handler.$emit('dispatch', (chart) => chart.legend.hide());
      this.handler.$emit('dispatch', (chart) => chart.legend.show(this.normalLegend()));
      if(!this.hasCurrentTimePeriodData(this.currentChartData)) {
        var cln = this.$el.querySelector('.c3-empty').cloneNode(true);
        cln.setAttribute('class', 'custom-no-data-message');
        cln.style.opacity = "1";
        this.$el.querySelector('.c3-empty').parentElement.appendChild(cln);

        this.handler.$emit('dispatch', (chart) => chart.legend.hide());
        this.handler.$emit('dispatch', (chart) => chart.legend.show(this.noDataLegend()));
      }
    },

    methods: {
      noDataLegend() {
        return this.currentChartData.reduce((memo, item) => {
          if(item[0].includes('Target')) {
            memo.push(item[0]);
          }
          return memo;
        }, [])
      },
      normalLegend() {
        if(Array.isArray(this.show_legend)) {
          return this.show_legend;
        }
        return this.currentChartData.reduce((memo, item) => {
          if(item[0] !== 'x') {
            memo.push(item[0]);
          }
          return memo;
        }, [])
      },
      addTargetsToData(data) {
        this.targets.forEach((target) => {
          data = data.concat([Object.assign([], data[0]).fill(target.value, 1).fill(target.text, 0, 1)])
        });
        return data;
      },
      currentTimePeriodData() {
        var chartData = this.addTargetsToData(this.chartData);
        if(moment(this.dateFilterStart, "MMM-YYYY").isAfter(moment(this.dateFilterEnd, "MMM-YYYY"))) return this.currentChartData;
        //return no data if the date filter starts after the last data
        if(moment(this.dateFilterStart, "MMM-YYYY").isAfter(moment(chartData[0][chartData[0].length-1], "YYYYMM"))) return this.currentChartData = [];
        //slice for all data
        //means if the end filter is after the last data we will get the data after the last data point we have
        var chartDataSlice = [1, chartData[0].length];
        chartData[0].slice(1,chartData[0].length).forEach((dataDate, i) => {
          if(moment(dataDate, "YYYYMM").isSame(moment(this.dateFilterStart, "MMM-YYYY"))) {
            chartDataSlice[0] = i+1;
          }
          if(moment(dataDate, "YYYYMM").isSame(moment(this.dateFilterEnd, "MMM-YYYY"))) {
            chartDataSlice[1] = i+2;
          }
        });
        var currentTimePeriodData = [];
        if(chartDataSlice.length == 2) {
          currentTimePeriodData = chartData.reduce((timePeriodData, columnData, i) => {
            timePeriodData[i] = [columnData[0]];
            timePeriodData[i] = timePeriodData[i].concat(columnData.slice(chartDataSlice[0], chartDataSlice[1]));
            return timePeriodData;
          }, []);
        }
        return this.currentChartData = currentTimePeriodData;
      },
      hasCurrentTimePeriodData: (currentChartData) => {
        var hasCurrentTimePeriodData = !!currentChartData.reduce((memo, column) => {
          if(column.slice(1).filter(datapoint => datapoint).length) {
            if(column[0] != 'x' && !column[0].includes('Target')) {
              memo.push(column);
            }
          }
          return memo;
        }, []).length;
        return hasCurrentTimePeriodData;
      }
    },
    watch: {
      dateFilterStart(newDateFilterStart) {
        var currentChartData = this.currentTimePeriodData();
        if(currentChartData.length) {
          this.handler.$emit('dispatch', (chart) => {
            chart.load({
              columns: currentChartData 
            });
          })
        }
      },
      dateFilterEnd(newDateFilterEnd) {
        var currentChartData = this.currentTimePeriodData();
        if(currentChartData.length) {
          this.handler.$emit('dispatch', (chart) => {
            chart.load({
              columns: currentChartData 
            });
          })
        }
      }
    },
    computed: mapState({
      dateFilterStart: 'actualDateFilterStart',
      dateFilterEnd: 'actualDateFilterEnd',
    })
  }
</script>

<style>
  @import '../../c3.min.css';
</style>
