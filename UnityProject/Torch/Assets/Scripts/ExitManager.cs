using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ExitManager : MonoBehaviour {

    //public ItemDataManager m_ItemDataManager;
    //public List<Transform> m_ExitChildList = new List<Transform>();
    public Material m_ActiveDoorMaterial;
    public Material m_NonActiveDoorMaterial;


    private List<Transform> m_ExitList = new List<Transform>();


    void Awake()
    {

        //すべてのExitオブジェクトをリストに入れる
        for (int i = 0; i < transform.childCount; i++)
        {
            m_ExitList.Add(transform.GetChild(i));
        }
    }

    private void Start()
    {
        foreach (Transform exitOne in m_ExitList)
        {
            //colliderをオンにする
            exitOne.GetChild(0).gameObject.GetComponent<MeshCollider>().enabled = true;
            //アクティブ時のMaterialに変更
            exitOne.GetChild(0).gameObject.GetComponent<Renderer>().material = m_ActiveDoorMaterial;
        }
    }

    public void CloseExit(int exitNumber)
    {
        m_ExitList[exitNumber].GetChild(0).gameObject.GetComponent<MeshCollider>().enabled = false;
        m_ExitList[exitNumber].GetChild(0).gameObject.GetComponent<Renderer>().material = m_NonActiveDoorMaterial;
    }
}
