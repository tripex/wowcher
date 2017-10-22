/**
 * Created by tripex on 21/01/2017.
 */
import Chart from 'chartist';

export default {
    props: ['series', 'id'],

    template: '<div id="@{{ id }}" class="ct-chart"></div>'
    ,

    mounted() {
        new Chart.Pie(this.$el, {
            series: this.series
        });
    }
}