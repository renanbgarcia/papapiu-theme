var thePdf = null;
var scale = 1,
    pageNum = 1,
    isRendering = false
    pageNumPending = null

function usePDF () {
  
  viewer = document.getElementById('the-canvas');
  
  if (!viewer) return
  
  const url = viewer.dataset.src;
  var buttonL = document.createElement('button')
  var buttonR = document.createElement('button')
  buttonL.className = 'pdf-button-left btn'
  buttonR.className = 'pdf-button-right btn'
  buttonL.innerHTML = "<i class='icon-arrow-left'></i>"
  buttonR.innerHTML = "<i class='icon-arrow-right'></i>"
  
  buttonL.onclick = onPrevPage
  buttonR.onclick = onNextPage
  
  viewer.append(buttonL, buttonR)
  
  var canvasLeft = document.createElement("canvas"); 
  canvasLeft.className = 'pdf-page-canvas col-12 col-sm-6';
  var canvasRight = document.createElement("canvas"); 
  canvasRight.className = 'pdf-page-canvas col-12 col-sm-6';
  
  // Asynchronous download of PDF
  var loadingTask = pdfjsLib.getDocument(url);
  loadingTask.promise.then(function(pdf) {
  
    thePdf = pdf; 
    viewer.appendChild(canvasLeft);
    viewer.appendChild(canvasRight);
    renderPages(pageNum);
  
  }, function (reason) {
    // PDF loading error
    console.error(reason);
  });
}

usePDF()

function renderPages(pageNum) {
  isRendering = true;
  thePdf.getPage(pageNum).then(function(page) {

    viewport = page.getViewport({ scale: scale });
    canvasLeft.height = viewport.height;
    canvasLeft.width = viewport.width;          
    page.render({canvasContext: canvasLeft.getContext('2d'), viewport: viewport})
  });

  if (pageNum + 1 >= thePdf.numPages) {
    canvasRight.getContext('2d').clearRect(0, 0, canvasRight.width, canvasRight.height)
    isRendering = false;
    return
  }
  thePdf.getPage(pageNum + 1).then(function(page) {
    viewport = page.getViewport({ scale: scale });
    canvasRight.height = viewport.height;
    canvasRight.width = viewport.width;          
    page.render({canvasContext: canvasRight.getContext('2d'), viewport: viewport})
  });
}

/**
 * If another page rendering in progress, waits until the rendering is
 * finised. Otherwise, executes rendering immediately.
 */
function queuerenderPages(num) {
  if (isRendering && false) {
    return
  } else {
    renderPages(num);
  }
}

/**
 * Displays previous page.
 */
function onPrevPage() {
  if (pageNum <= 1) {
    return;
  }
  pageNum = pageNum - 2;
  queuerenderPages(pageNum);
}

/**
 * Displays next page.
 */
function onNextPage() {
  if (pageNum >= thePdf.numPages) {
    return;
  }
  pageNum = pageNum + 2;
  queuerenderPages(pageNum);
}