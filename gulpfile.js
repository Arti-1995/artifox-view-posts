"use strict";

const gulp = require("gulp");
const webpack = require("webpack-stream");
const sass = require('gulp-sass')(require('sass'));
const concat = require('gulp-concat');
const cleanCSS = require('gulp-clean-css');

const dist = "./assets/dist/";

gulp.task("build-js", () => {
    return gulp.src("./assets/src/js/index.js")
        .pipe(webpack({
            mode: 'development',
            output: {
                filename: 'script.js'
            },
            watch: false,
            devtool: "source-map",
            module: {
                rules: [
                    {
                        test: /\.m?js$/,
                        exclude: /(node_modules|bower_components)/,
                        use: {
                            loader: 'babel-loader',
                            options: {
                                presets: [['@babel/preset-env', {
                                    debug: true,
                                    corejs: 3,
                                    useBuiltIns: "usage"
                                }]]
                            }
                        }
                    }
                ]
            }
        }))
        .pipe(gulp.dest(dist + 'js/'));
});

gulp.task("build-css", () => {
    return gulp.src('./assets/src/sass/main.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(concat("all.css"))
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(gulp.dest(dist + './css'));
});

gulp.task("watch", () => {

    gulp.watch("./assets/src/js/**/*.js", gulp.parallel("build-js"));
    gulp.watch('./assets/src/sass/**/*.scss', gulp.parallel("build-css"));
});

gulp.task("build", gulp.parallel("build-js", "build-css"));

gulp.task("build-prod-js", () => {
    return gulp.src("./assets/src/js/index.js")
        .pipe(webpack({
            mode: 'production',
            output: {
                filename: 'script.js'
            },
            module: {
                rules: [
                    {
                        test: /\.m?js$/,
                        exclude: /(node_modules|bower_components)/,
                        use: {
                            loader: 'babel-loader',
                            options: {
                                presets: [['@babel/preset-env', {
                                    corejs: 3,
                                    useBuiltIns: "usage"
                                }]]
                            }
                        }
                    }
                ]
            }
        }))
        .pipe(gulp.dest(dist + 'js/'));
});

gulp.task("default", gulp.parallel("watch", "build"));