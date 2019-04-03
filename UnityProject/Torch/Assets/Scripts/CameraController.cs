using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class CameraController : MonoBehaviour {

    [SerializeField] private GameObject m_MainCamera;
    [SerializeField] private GameObject m_BirdsEyeCamera;

    private void Awake()
    {
        m_BirdsEyeCamera.SetActive(false); //俯瞰ビューを非アクティブ化
    }

    void Start () {
		
	}
	
	
	void Update () {
		
	}

    public void BirdsView()
    {
        m_BirdsEyeCamera.SetActive(true); //俯瞰ビューに設定
        
    }
}
