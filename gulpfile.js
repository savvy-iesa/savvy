'use strict';
var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var sass        = require('gulp-ruby-sass');

gulp.task('css', function()
{
    return sass('sass/*', {style : "expanded"})
        .pipe(gulp.dest('css/'))
        .pipe(browserSync.stream());
});

gulp.task('watch', function() {
    browserSync.init({
        server: "./",
        port: 15000
    });
    gulp.watch("sass/*", ['css']);
    gulp.watch("*.html").on('change', browserSync.reload);
});