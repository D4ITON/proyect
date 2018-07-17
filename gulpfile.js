const gulp = require('gulp'),
	sass = require('gulp-sass'),
	autoprefixer = require('gulp-autoprefixer');

gulp.task('sass',()=>

	gulp.src('./resources/assets/sass/*.scss')
	.pipe(sass({
		outputStyle: 'expanded'
	}))
	.pipe(gulp.dest('./public/css'))
	.pipe(autoprefixer({
		versions:['last 2 browsers']
	}))
);

gulp.task('default',()=>{
	gulp.watch('./resources/assets/sass/*.scss',['sass']);
});