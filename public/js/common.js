$(document).ready(function() {

    var start = new Date($('#start_date').val());
    var end = d3.time.day.offset(new Date($('#end_date').val()), 1);

    buildVisualisation(start, end);

    $('#start_date, #end_date').on('change', function() {

        start = new Date($('#start_date').val());
        end = d3.time.day.offset(new Date($('#end_date').val()),1);

        buildVisualisation(start, end);

    });

    function buildVisualisation(start, end) {

        d3.json('/data/telescope-events/' + (start.getTime()/1000) + '/' + (end.getTime()/1000), function(error, data) {

            $('#vis').html('');

            var xPagePadding = 450;
            var yPagePadding = 320;
            var height = $(window).height() - yPagePadding;
            var width = $(window).width() - xPagePadding;
            var xPadding = 100;
            var yPadding = 30;

            var events = data.events;
            for (var i in events) {
                events[i].start = new Date(events[i].start*1000);
                events[i].end = new Date(events[i].end*1000);
            }

            var telescopeIds = [];
            var telescopeNames = [];
            for (var j in data.telescopes) {
                telescopeIds.push(data.telescopes[j].id);
                telescopeNames.push(data.telescopes[j].name);
            }

            //start = d3.min(events, function(d) { return d.start; });
            //end = d3.max(events, function(d) { return d.end; });

            var xScale = d3.time.scale()
                           .domain([start, end])
                           .range([0, width])
                           .clamp(true);

            var yScale = d3.scale.ordinal()
                           .domain(telescopeIds)
                           .rangeRoundBands([0, height]);

            var colorScale = d3.scale.category20c()
                               .domain(telescopeIds);

            var xAxis = d3.svg.axis()
                          .scale(xScale)
                          .orient('bottom')
                          .tickSize(0)
                          .tickPadding(10);

            var yAxis = d3.svg.axis()
                          .scale(yScale)
                          .orient('left')
                          .tickValues(telescopeNames)
                          .tickSize(0)
                          .tickPadding(10);

            var infopane = d3.select('#info-pane');

            // draw svg
            var svg = d3.select('#vis')
                        .append('svg')
                        .attr('height', height + yPadding)
                        .attr('width', width + xPadding);

            // draw x-axis
            svg.append('g')
               .attr('class', 'axis')
               .attr('transform', 'translate(' + xPadding + ',' + (height-1) + ')')
               .style('fill', '#FFF')
               .call(xAxis);

            // draw x-axis grid
            svg.append('g')
               .attr('class', 'grid')
               .attr("transform", 'translate(' + xPadding + ',' + (height-1) + ')')
               .call(xAxis.tickSize(-height, 0, 0).tickFormat(''));

            // draw y-axis
            svg.append('g')
               .attr('class', 'axis')
               .attr('transform', 'translate(' + xPadding + ',0)')
               .style('fill', '#FFF')
               .call(yAxis);

            // draw data bars
            var bars = svg.selectAll('.bar')
                          .data(events)
                        .enter().append('rect')
                          .attr('class', 'bar')
                          .attr('x', xPadding+1)
                          .attr('y', 0)
                          .attr('fill', function(d) { return colorScale(d.telescope_id); })
                          .attr('transform', function(d) { return 'translate(' + Math.ceil(xScale(d.start)) + ',' + yScale(d.telescope_id) + ')'; })
                          .on("mouseover", function() {
                            d3.select(this)
                              .transition()
                                .duration(200)
                                .style('opacity', 0.8);
                          })
                          .on('mouseout', function() {
                            d3.select(this)
                              .transition()
                                .duration(200)
                                .style('opacity', 1);
                          })
                          .on("click", function(d) {
                            infopane.html('');

                            d3.select(this)
                              .transition()
                                .duration(200)
                                .style('opacity', 0.8);

                            infopane.html('<strong>Target:</strong> ' + d.obs_target + '<br />' +
                                          '<strong>RA:</strong> ' + d.obs_ra + '<br />' +
                                          '<strong>Decl:</strong> ' + d.obs_decl + '<br />' +
                                          '<strong>Start:</strong> ' + d.start + '<br />' +
                                          '<strong>End:</strong> ' + d.end + '<br /><br />' +
                                          d.notes);
                          })
                          .transition()
                            .delay(function(d) { return d.telescope_id * 80; })
                            .duration(1200)
                            .ease('elastic')
                            .attrTween('height', function(d) { return d3.interpolate(0, yScale.rangeBand() - 2); })
                            .attrTween('width', function(d) { return d3.interpolate(0, Math.ceil(Math.abs((xScale(d.end) - xScale(d.start)) - 1))); });

        });

    }

});