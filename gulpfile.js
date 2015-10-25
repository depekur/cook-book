var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync');
var autoprefixer = require('gulp-autoprefixer');


gulp.task('sass', function() {
  return gulp.src('app/sass/style.scss')
    .pipe(sass({ outputStyle: 'compressed', includePaths : ['app/sass/**/'] }))
    .on('error', sass.logError)
    .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
    .pipe(gulp.dest('app/css/'))
    .pipe(browserSync.reload({ stream: true }))

});



gulp.task('browserSync', function() {
  browserSync({
    server: {
      baseDir: './app/'
    },
  })
});



gulp.task('default', ['browserSync', 'sass'], function(){
  gulp.watch('app/sass/**/*.scss', ['sass']); 
  gulp.watch('app/*.html', browserSync.reload);
  gulp.watch('app/views/*.html', browserSync.reload);
  gulp.watch('app/js/**/*.js', browserSync.reload); 

})