import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

//set up date range
import moment from 'moment'

function getRangeOfDates(start, end, key, arr = [start.startOf(key)]) {
  if(start.isAfter(end)) throw new Error('start must precede end')
  const next = moment(start).add(1, key).startOf(key);
  if(next.isAfter(end, key)) return arr.map((m) => {return m.format("MMM YYYY")});
  return getRangeOfDates(next, end, key, arr.concat(next));
}

const begin = moment("201711", "YYYYMM");
const end = moment().subtract(1,'months');
const rangeOfDates = getRangeOfDates(begin, end, 'month');

const mutations = {
  SELECT_START_DATE (state, newStartDate) {
    state.dateFilterStart = newStartDate;
  },
  SELECT_END_DATE (state, newEndDate) {
    state.dateFilterEnd = newEndDate;
  },
  SELECT_FILTER_DATES(state) {
    state.actualDateFilterStart = state.dateFilterStart;
    state.actualDateFilterEnd = state.dateFilterEnd;
  },
  SELECT_DEFAULT_FILTER_DATES(state) {
    state.dateFilterStart = rangeOfDates[0];
    state.dateFilterEnd = rangeOfDates[rangeOfDates.length-1];
    state.actualDateFilterStart = state.dateFilterStart;
    state.actualDateFilterEnd = state.dateFilterEnd;
  }
};
const store = new Vuex.Store({
  state: {
    chartsData: chartsData,
    dateRange: rangeOfDates,
    dateFilterStart: rangeOfDates[0],
    dateFilterEnd: rangeOfDates[rangeOfDates.length-1],
    actualDateFilterStart: rangeOfDates[0],
    actualDateFilterEnd: rangeOfDates[rangeOfDates.length-1]
  },
  mutations: mutations
})

export default store;
