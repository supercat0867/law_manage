let data = [
    {
        name: "刑事类",
        children: [
            {
                title: "刑事辩护专业委员会",
                url: "/lvguan/lawyer?type=刑事辩护专业委员会"
            },
            {
                title: "刑民交叉案专业委员会",
                url: "/lvguan/lawyer?type=刑民交叉案专业委员会"
            },
            {
                title: "军事法庭受理案件专业委员会",
                url: "/lvguan/lawyer?type=军事法庭受理案件专业委员会"
            },
            {
                title: "企业合规不诉专业委会",
                url: "/lvguan/lawyer?type=企业合规不诉专业委会"
            }
        ]
    },
    {
        name: "民事类",
        children: [
            {
                title: "企业合规专业委员会",
                url: "/lvguan/lawyer?type=企业合规专业委员会"
            },
            {
                title: "政府法律顾问专业委员会",
                url: "/lvguan/lawyer?type=政府法律顾问专业委员会"
            },
            {
                title: "企业法律顾问专业委员会",
                url: "/lvguan/lawyer?type=企业法律顾问专业委员会"
            },
            {
                title: "破产清算、重组、重整专业委员会",
                url: "/lvguan/lawyer?type=破产清算、重组、重整专业委员会"
            },
            {
                title: "建筑工程纠纷类专业委员会",
                url: "/lvguan/lawyer?type=建筑工程纠纷类专业委员会"
            },
            {
                title: "矿山纠纷类专业委员会",
                url: "/lvguan/lawyer?type=矿山纠纷类专业委员会"
            },
            {
                title: "民间借贷纠纷类专业委员会",
                url: "/lvguan/lawyer?type=民间借贷纠纷类专业委员会"
            },
            {
                title: "公司股权纠纷类专业委员会",
                url: "/lvguan/lawyer?type=公司股权纠纷类专业委员会"
            },
            {
                title: "婚姻、家庭纠纷类专业委员会",
                url: "/lvguan/lawyer?type=婚姻、家庭纠纷类专业委员会"
            },
            {
                title: "专利、著作权纠纷类专业委员会",
                url: "/lvguan/lawyer?type=专利、著作权纠纷类专业委员会"
            },
            {
                title: "不良资产处置专业委员会",
                url: "/lvguan/lawyer?type=不良资产处置专业委员会"
            },
            {
                title: "保险理赔纠纷专业委员会",
                url: "/lvguan/lawyer?type=保险理赔纠纷专业委员会"
            },
            {
                title: "信托与家族财富管理专业委员会",
                url: "/lvguan/lawyer?type=信托与家族财富管理专业委员会"
            },
            {
                title: "裁决、判决执行专业委员会",
                url: "/lvguan/lawyer?type=裁决、判决执行专业委员会"
            }
        ]
    },
    {
        name: "行政类",
        children: [
            {
                title: "行政诉讼专业委员会",
                url: "/lvguan/lawyer?type=行政诉讼专业委员会"
            },
            {
                title: "征地拆迁补偿纠纷专业委员会",
                url: "/lvguan/lawyer?type=征地拆迁补偿纠纷专业委员会"
            },
            {
                title: "政府立法专业委员会",
                url: "/lvguan/lawyer?type=政府立法专业委员会"
            },
        ]
    },
    {
        name: "财税类",
        children: [
            {
                title: "税务筹划专业委员会",
                url: "/lvguan/lawyer?type=税务筹划专业委员会"
            },
            {
                title: "股权架构设计专业委员会",
                url: "/lvguan/lawyer?type=股权架构设计专业委员会"
            },
        ]
    },
    {
        name: "法研专家",
        children: [
            {
                title: "法研专家",
                url: "/lvguan/lawyer?type=法研专家"
            }
        ]
    }];

function getPar(par){
    //获取当前URL
    var local_url = document.location.href;
    //获取要取得的get参数位置
    var get = local_url.indexOf(par +"=");
    if(get == -1){
        return 0;
    }
    //截取字符串
    var get_par = local_url.slice(par.length + get + 1);
    //判断截取后的字符串是否还有其他get参数
    var nextPar = get_par.indexOf("&");
    if(nextPar != -1){
        get_par = get_par.slice(0, nextPar);
    }
    if (get_par>5){
        get_par=1;
    }
    return get_par-1;
}

let curIndex = getPar('catalogue')
let show = setReactive()
let loading = false
let alert = false
let timer = null
let timer2 = null

let showAlert = (index, children) => {
    if (curIndex === index) return;
    show.loading = true
    // 旋转时点击其它
    if (timer) {
        show.loading = false
        clearTimeout(timer)
        timer = null
    }
    // 子选择还在
    if (timer2) {
        show.alert = false
        clearTimeout(timer2)
        timer2 = null
    }
    // 处理
    timer = setTimeout(() => {
        show.loading = false
        timer = null
        // 子选项为空时，弹窗
        if (!children[0]) {
            show.alert = true
            timer2 = setTimeout(() => {
                show.alert = false
                timer2 = null
            }, 600);
        }
    }, 300);
}


// 创建 nav 文档碎片
function createNav () {
    let fa = document.getElementsByClassName('nav')[0]
    let navFragment = document.createDocumentFragment()
    let domArr = []
    let curDom = null
    // 循环
    data.forEach((v, i) => {
        let div = document.createElement('div')
        div.classList.add("nav-item")
        let p = document.createElement('p')
        p.innerText = v.name
        div.appendChild(p)
        div.onclick = (e) => {
            if (curIndex === i) return;
            // 1 触发动画
            showAlert(i, v.children)
            // 2 切换当前项
            curIndex = i
            // 3 添加类
            domArr[i].classList.add("active")
            // 4 上一个清除
            if (curDom) {
                curDom.classList.remove("active")
            }
            // 5 切换
            curDom = domArr[i]
            // 6 更新列表
            createListItem()
        }
        domArr.push(div)
        navFragment.appendChild(div)
    })
    // 初始化 active
    curDom = domArr[curIndex]
    curDom.classList.add("active")
    // 添加到 nav 
    fa.appendChild(navFragment)
}

// 创建 list-item
function createListItem () {
    let fa = document.getElementsByClassName("list-item")[0]
    // 清空列表
    fa.innerHTML = ""
    // 添加新的列表
    let listFragment = document.createDocumentFragment()
    data[curIndex].children.forEach(v => {
        let fa = document.createElement("a")
        fa.classList.add("item")
        fa.target = "_blank"
        // 添加链接
        if (v.url) {
            fa.href = v.url
        }
        let span = document.createElement("span")
        span.innerText = v.title
        let img = document.createElement("img")
        img.src = "../visitor/images/right.png"
        img.alt = "图片加载失败"
        fa.append(span, img)
        listFragment.appendChild(fa)
    })
    fa.appendChild(listFragment)
}

// 设置响应式触发弹窗
function setReactive () {
    let obj = {}
    let loadDom = document.getElementsByClassName("loading-box")[0]
    let alertDom = document.getElementsByClassName("alert-box")[0]
    let _loading = false
    let _alert = false
    Object.defineProperties(obj, {
        loading: {
            get () { return _loading },
            set (newV) {
                // 1 更新值
                _loading = newV
                // 2 显示隐藏弹窗
                loadDom.style.display = newV ? "block" : "none"
            },
        },
        alert: {
            get () { return _alert },
            set (newV) {
                // 1 更新值
                _alert = newV
                // 2 显示隐藏弹窗
                alertDom.style.display = newV ? "block" : "none"
            },
        }
    })
    // 初始化
    obj.loading = false
    obj.alert = false
    return obj
}

createNav()
createListItem()

