var gulp = require('gulp');
var zip = require('gulp-zip');

gulp.task('zip', function () {
    return gulp.src(['cif_importer/*','cif_importer/**/*'], {base: "./cif_importer"})
        .pipe(zip('cif_importer.zip'))
        .pipe(gulp.dest('./'));
});

gulp.task('default', ['zip']);