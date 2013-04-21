$(document).ready(function() {

    d3.json('/data/telescope-events', function(error, data) {

        var xPagePadding = 450;
        var height = 300;
        var width = $(window).width() - xPagePadding;
        var xPadding = 100;
        var yPadding = 30;

        var events = data.events;
        var telescopeIds = [];
        var telescopeNames = [];
        for (var i in data.telescopes) {
            telescopeIds.push(data.telescopes[i].id);
            telescopeNames.push(data.telescopes[i].name);
        }

        //var start = new Date(d3.min(events, function(d) { return d.start; })*1000);
        //var end = new Date(d3.max(events, function(d) { return d.end; })*1000);
        var start = d3.time.day.offset(new Date(), -7);
        var end = d3.time.day.offset(new Date(), 7);

        console.log(end);

        var xScale = d3.time.scale()
                       .domain([start, end])
                       .range([0, width])
                       .clamp(true);

        var yScale = d3.scale.ordinal()
                       .domain(telescopeIds)
                       .rangeRoundBands([0, height]);

        var colorScale = d3.scale.category20c();

        var xAxis = d3.svg.axis()
                      .scale(xScale)
                      .orient('bottom')
                      .tickSize(1)
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
                      .attr('height', function(d) { return yScale.rangeBand() - 1; })
                      .attr('width', function(d) { return (xScale(new Date(d.end*1000)) - xScale(new Date(d.start*1000))) - 1; })
                      .attr('transform', function(d) { return 'translate(' + xScale(new Date(d.start*1000)) + ',' + yScale(d.telescope_id) + ')'; });

        // Actions
        bars.on("mouseover", function(d) {
            d3.select(this)
              .transition()
              .duration(200)
              .style('opacity', 0.9);

            infopane.html('Target: ' + d.obs_target + '<br />' +
                          'RA: ' + d.obs_ra + '<br />' +
                          'Decl: ' + d.obs_decl + '<br />' +
                          'Start:' + d.start + '<br />' +
                          'End:' + d.end + '<br /><br />' +
                          d.notes);
          })
          .on('mouseout', function(d) {
            d3.select(this)
              .transition()
              .duration(200)
              .style('opacity', 1);

            infopane.html('');
        });

    });

});