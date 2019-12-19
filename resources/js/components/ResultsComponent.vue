<template>
    <div class="row results-component">
        <div class="col-12  h-100" v-if="cumulative.length && yourownresults.length">
            <TrendChart
                :datasets="[
                    {
                        data: cumulative,
                        smooth: true,
                        fill: true,
                        className: 'cumulative'
                    },
                    {
                        data: yourownresults,
                        smooth: true,
                        fill: true,
                        className: 'yourownresults'
                    }
                ]"
                :grid="{
                    verticalLines: false,
                    horizontalLines: true
                }"
                :labels="{
                    xLabels: ['0', '50%', 'all'],
                    yLabels: 5,
                    yLabelsTextFormatter: val => Math.round(val * 10) / 10
                }"
                :min="0">
            </TrendChart>

        </div>
    </div>
</template>

<script>
    export default {
        name: "ResultsComponent",

        props: [
            'rps_id',
            'allResults',
            'yourResults'
        ],

        data() {
            return {
                'cumulative': [],
                'yourownresults': []
            }
        },

        created() {
            this.$eventBus.$on('getresults', this.getResults)
        },

        mounted() {
            this.computeCumulative(this.allResults)
            this.computeYourOwnResults(this.yourResults)
        },

        methods: {
            computeCumulative(allResults) {
                var cumulative = []
                var sum = 0
                allResults.forEach( result => {
                    switch(result.winner){
                        case 0:
                            cumulative.push(sum)
                            break
                        case 1:
                            cumulative.push(sum++)
                            break
                        case 2:
                            cumulative.push(sum--)
                            break
                    }
                } )
                this.cumulative = cumulative
            },

            computeYourOwnResults(yourResults) {
                var yourownresults = []
                var sum = 0
                yourResults.forEach( result => {
                    switch(result.winner){
                        case 0:
                            yourownresults.push(sum)
                            break
                        case 1:
                            yourownresults.push(sum++)
                            break
                        case 2:
                            yourownresults.push(sum--)
                            break
                    }
                } )
                this.yourownresults = yourownresults
            },

            getResults() {
                axios.get('/api/ropasi/' + this.rps_id)
                .then( response => {
                    this.computeCumulative( response.data[0] )
                    this.computeYourOwnResults( response.data[1] )
                } )
            }
        }
    }
</script>

<style scoped>

</style>
