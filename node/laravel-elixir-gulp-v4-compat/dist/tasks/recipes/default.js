'use strict';

var _runSequence = require('gulp4-run-sequence');

var _runSequence2 = _interopRequireDefault(_runSequence);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

/*
 |----------------------------------------------------------------
 | Default Task
 |----------------------------------------------------------------
 |
 | This task will run when the developer executes "gulp" on the
 | command line. We'll use this configuration object to know
 | which tasks should be fired when this task is executed.
 |
 */

gulp.task('all', gulp.series(function (done, callback) {
    Elixir.isRunningAllTasks = true;

    Elixir.hooks.before.forEach(function (hook) {
        return hook();
    });

    _runSequence2.default.apply(this, Elixir.tasks.names().concat(callback));

    done();
}));

gulp.task('default', gulp.series(['all'], function (done) {
    // Once all tasks have been triggered, we can
    // render a pretty table for reporting.
    Elixir.log.tasks();

    Elixir.isRunningAllTasks = false;

    done();
}));
