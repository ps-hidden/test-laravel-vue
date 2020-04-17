self.__precacheManifest = [].concat(self.__precacheManifest || []);

for (var i = 0; i < self.__precacheManifest.length; i++) {
  if (self.__precacheManifest[i].url === '/.htaccess') {
    var arr = self.__precacheManifest.slice()
    arr.splice(i, 1)
    self.__precacheManifest = [].concat(arr)
    break
  }
}

workbox.precaching.precacheAndRoute(self.__precacheManifest, {});

self.addEventListener('message', (msg) => {
  if (msg.data.action === 'skipWaiting') self.skipWaiting()
})
