import fitz
import sys
import os
def pyMuPDF_fitz():
    try:
        pdfPath = sys.argv[1]
        a=pdfPath.split("/")[-1]
        imagePath=sys.argv[2]+a.split(".")[0]
        pdfDoc = fitz.open(pdfPath)
        for pg in range(pdfDoc.pageCount):
            page = pdfDoc[pg]
            rotate = int(0)
            zoom_x = 1.33333333
            zoom_y = 1.33333333
            mat = fitz.Matrix(zoom_x, zoom_y).preRotate(rotate)
            pix = page.getPixmap(matrix=mat, alpha=False)
            if not os.path.exists(imagePath):
                os.makedirs(imagePath)
            pix.writePNG(imagePath + '/' + '%s.png' % pg)
        print("success")
    except Exception as e:
        print(repr(e))

if __name__ == "__main__":
    pyMuPDF_fitz()