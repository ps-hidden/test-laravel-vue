/* eslint-disable */
const webpack = require('webpack')
const Terser = require('terser-webpack-plugin')


const app = {
  publicPath: '/',
  outputDir: '../public',
  productionSourceMap: false,
  chainWebpack: config => {
    config.resolve.alias
      .set('@ant-design/icons/lib/dist$', __dirname + '/src/lib/ant-design/icons.js');

    config.module.rule('svg').uses.clear();

    config.module.rule('svg')
      .test(/(assets\/svg-inline).+\.svg$/)
      .use('file-loader')
      .loader('svg-sprite-loader');

    config.module.rule('svgi')
      .test(/(assets(?!\/svg-inline)).+\.svg$/)
      .use('file-loader')
      .loader('file-loader')
      .tap(options => Object.assign(options || {}, { name: 'img/[name].[hash:8].[ext]' }));
  },
  devServer: {
    proxy: 'http://laravel.vue',
    public: 'http://laravel.vue:8080',
    overlay: { warnings: true, errors: true },
    headers: { 'Access-Control-Allow-Origin': '*' },
    disableHostCheck: true,
    inline: true,
    hot: true
  }
};

if (process.env.NODE_ENV === 'production') {
  app.indexPath = __dirname + '/../resources/views/app.blade.php';
  app.configureWebpack = {
    // optimization: { splitChunks: false },
    plugins: [
      new Terser({
        parallel: true,
        terserOptions: { output: { comments: false } }
      }),
      new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/),
    ]
  };
  /*
  app.pwa = {
    manifestOptions: {
      name: "Laravel",
      short_name: "Laravel",
      theme_color: "#000000",
      background_color: "#ffffff",
      start_url: "/",
      display: "standalone",
      icons: [{ "src": "/img/logo.png", "sizes": "512x512", "type": "image/png" }]
    },
    themeColor: "#000000",
    iconPaths: {
      favicon32: 'img/logo.png',
      favicon16: 'img/logo.png',
      appleTouchIcon: 'img/logo.png',
      maskIcon: 'img/logo.png',
      msTileImage: 'img/logo.png',
    },
    appleMobileWebAppCapable: "yes",
    appleMobileWebAppStatusBarStyle: "default",
    workboxPluginMode: 'InjectManifest',
    workboxOptions: { swSrc: './service-worker.js' }
  }
  */
}

module.exports = app
