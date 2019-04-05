using System.Collections;
using System.Collections.Generic;
using System.Linq;
using UnityEngine;

public class ExitManager : MonoBehaviour {

    public Material m_ActiveDoorMaterial;
    public Material m_NonActiveDoorMaterial;

    private List<Transform> m_ExitList = new List<Transform>();

    private void Awake()
    {
        //すべてのExitオブジェクトをリストに入れる
        for (int i = 0; i < transform.childCount; i++)
        {
            m_ExitList.Add(transform.GetChild(i));
        }
    }

    private void Start()
    {
        for(int i = 0; i < m_ExitList.Count(); i++)
        {
            //colliderをオンにする
            m_ExitList[i].GetChild(0).gameObject.GetComponent<MeshCollider>().enabled = true;
            //アクティブ時のMaterialに変更
            m_ExitList[i].GetChild(0).gameObject.GetComponent<Renderer>().material = m_ActiveDoorMaterial;
            //出口番号の設定
            m_ExitList[i].GetChild(0).gameObject.GetComponent<ExitDoor>().m_DoorNumber = i + 1;
            Debug.Log(m_ExitList[i].GetChild(0).gameObject.GetComponent<ExitDoor>().m_DoorNumber);
        }
    }

    //指定した出口番号の出口を閉鎖する
    public void CloseExit(int exitNumber)
    {
        m_ExitList[exitNumber].GetChild(0).gameObject.GetComponent<MeshCollider>().enabled = false;
        m_ExitList[exitNumber].GetChild(0).gameObject.GetComponent<Renderer>().material = m_NonActiveDoorMaterial;
    }
}
