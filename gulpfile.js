'use strict';

var gulp = require("gulp");
var sass = require("gulp-sass");
var config = {
    sassPath: './src/UtExam/ProEvalBundle/Resources/public/styles',   // store the sass files I create
    nodeModules: './node_modules/'
}

gulp.task('sass',function(){
  return gulp.src(config.sassPath + '/index.scss')
    .pipe(sass(
      { outputStyle: 'compressed',
        includePaths: [
            './src/UtExam/ProEvalBundle/Resources/public/styles',
            config.nodeModules
        ]
    }).on("error",sass.logError))
    .pipe(gulp.dest('./src/UtExam/ProEvalBundle/Resources/public/styles/'))
});
gulp.task('watch', function() {
  gulp.watch(config.sassPath + '/*.scss', ['sass']);
});
gulp.task('default',["sass"]);
