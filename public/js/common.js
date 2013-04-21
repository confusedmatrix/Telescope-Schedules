$(document).ready(function() {

    d3.json('/data/telescope-events', function(error, data) {

        var height = 300;
        var width = 800;
        var xPadding = 20;
        var yPadding = 30;

        var events = data.events;
        var telescopes = [];
        for (var i in data.telescopes)
            telescopes.push(data.telescopes[i].id);

        //var start = new Date(d3.min(events, function(d) { return d.start; })*1000);
        //var end = new Date(d3.max(events, function(d) { return d.end; })*1000);
        var start = d3.time.day.offset(new Date(), -1);
        var end = d3.time.day.offset(new Date(), 1);

        console.log(end);

        var xScale = d3.time.scale()
                       //d3.scale.linear()
                       //.domain([d3.min(events, function(d) { return d.start; }), d3.max(events, function(d) { return d.end; })])
                       .domain([start, end])
                       .range([0, width])
                       .clamp(true);

        var yScale = d3.scale.ordinal()
                       .domain(telescopes)
                       .rangeRoundBands([0, height]);

        var xAxis = d3.svg.axis()
                      .scale(xScale)
                      .orient('bottom')
                      //.ticks(d3.time.hours, 1)
                      //.tickFormat(d3.time.format('%H:%M'))
                      .tickSize(1)
                      .tickPadding(10);

        var yAxis = d3.svg.axis()
                      .scale(yScale)
                      .orient('left')
                      .tickSize(1)
                      .tickPadding(10);

        var svg = d3.select('.well')
                    .append('svg')
                    .attr('height', height + yPadding)
                    .attr('width', width + xPadding);

        svg.selectAll('.bar')
           .data(events)
         .enter().append('rect')
           .attr('class', 'bar')
           .attr('x', xPadding)
           .attr('y', 0)
           .attr('height', function(d) { return yScale.rangeBand() - 1; })
           .attr('width', function(d) { return (xScale(new Date(d.end*1000)) - xScale(new Date(d.start*1000))) - 1; })
           .attr('transform', function(d) { return 'translate(' + xScale(new Date(d.start*1000)) + ',' + yScale(d.telescope_id) + ')'; });

        svg.append('g')
           .attr('class', 'axis')
           .attr('transform', 'translate(' + xPadding + ',' + (height) + ')')
           .call(xAxis);

        svg.append('g')
           .attr('class', 'axis')
           .attr('transform', 'translate(' + xPadding + ',0)')
           .call(yAxis);

    });

});