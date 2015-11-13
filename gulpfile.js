var gulp = require('gulp');
var sass = require('gulp-sass');


gulp.task('sass', function() {
  return gulp.src('app/sass/style.scss')
    .pipe(sass({ outputStyle: 'compressed', includePaths : ['app/sass/**/'] }))
    .on('error', sass.logError)
    .pipe(gulp.dest('app/css/'))

});


gulp.task('default', ['sass'], function(){
  gulp.watch('app/sass/**/*.scss', ['sass']); 
})