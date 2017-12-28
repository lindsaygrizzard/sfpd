var gulp = require('gulp');
var sass = require('gulp-sass');
 
gulp.task('default', function(){
 
    console.log('default gulp task...')
 
});

 
gulp.task('sass', function () {
 
    gulp.src('../assets/scss/*.scss')
 
        .pipe(sass())
 
        .pipe(gulp.dest('../assets/css'));
 
});

gulp.task('sass:watch', function () {
  gulp.watch('../assets/scss/**/*.scss', ['sass']);
});
 
gulp.task('default', ['sass']);